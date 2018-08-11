<?php 
namespace ProgrammingBlog\Repositories;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Model;
use ProgrammingBlog\Models\BaseModel;
use ProgrammingBlog\Repositories\Contracts\RepositoryInterface;
use ProgrammingBlog\Repositories\Exceptions\RepositoryException;
use ProgrammingBlog\Repositories\Exceptions\ResourceNotFoundException;

/**
* Base Repository class
*
* @todo Ability to use cache on these getters
*/
abstract class Repository implements RepositoryInterface
{
    /**
     * App Context
     *
     * @var Container
     */
    private $app;

    /**
     * Model instance
     * 
     * @var BaseModel
     */
    protected $model;

    /**
     * Relatiopnships to include when fetching 
     * resource (eager loading).
     * 
     * @var array
     */
    protected $relationships = [];

    /**
     * Sort fields.
     * 
     * @var array
     */
    protected $sorts = [];

    protected $limit = 0;

    protected $perPage = 0;

    /**
     * Constructor
     *
     * @param Container $context 
     */
    public function __construct(Container $context)
    {
        $this->app = $context;
        $this->makeModel();
    }

    /**
     * Specify model class name
     * 
     * @return mixed
     */
    abstract function model();

    /**
     * Retrieves the model
     *
     * @return BaseModel
     */
    protected function getModel()
    {
        $model = $this->model;

        if (!empty($this->relationships)) {
            $model = $model->with($this->relationships);
        }
        
        if (!empty($this->sorts)) {
            foreach ($this->sorts as $sort => $direction) {
                $model->orderBy($sort, $direction);
            }
        }

        if ($this->limit > 0) {
            $model->take($this->limit);
        }

        return $model;
    }

    /**
     * Retrieves all model records
     *
     * @param  array  $columns properties to populate
     * @return App\Models\BaseModel
     */
    public function all($columns = array('*'))
    {
        if ($this->perPage > 0) {
            return $this->getModel()
                ->paginate($this->perPage);
        }
        return $this->getModel()->get($columns);
    }

    /**
     * {@inheritdoc}
     */
    public function get($id) : ?BaseModel
    {
        return $this->getModel()->find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function getBy(array $conditions)
    {
        $queryBuilder = $this->model;

        foreach ($conditions as $column => $condition) {
            if (!is_array($condition)) {
                $condition = [$condition];
            }

            $queryBuilder = $queryBuilder->whereIn($column, $condition);
        }

        if ($this->perPage > 0) {
            return $queryBuilder->paginate($this->perPage);
        }

        return $queryBuilder->get();
    }

    /**
     * {@inheritdoc}
     */
    public function exists(int $id) : bool
    {
        return !empty($this->get($id));
    }

    /**
     * Throws if the resource does not exists.
     * 
     * @param  int    $id The resource ID
     * @throws ResourceNotFoundException
     */
    public function failIfNotExists(int $id)
    {
        if (!$this->exists($id)) {
            throw new ResourceNotFoundException('Can\'t find the required resource.');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        return $this->get($id)->update($data);
    }

    public function updateBy($attr, $key, array $data)
    {
        return $this->model->where($attr, '=', $key)->update($data);
    }

    /**
     * Delete a storage model
     * 
     * @param  integer $id the model Id
     */
    public function delete($id)
    {
        return $this->model->delete();
    }

    /**
     * Adds relationships to eager load
     * 
     * @param  mixed $relationship 
     * @return Repository
     */
    public function include($relationship)
    {
        if (!is_array($relationship)) {
            $relationship = [$relationship];
        }

        $this->relationships = array_merge($this->relationships, $relationship);
        return $this;
    }

    /**
     * Paginates the resource
     * 
     * @param  int|integer $perPage The amount of items to paginate
     * @return Repository
     */
    public function paginate(int $perPage = 10) : Repository
    {
        $this->perPage = $perPage;
        return $this;
    }

    /**
     * Limits the result
     *
     * @param  int|integer $limit The limit
     * @return Repository
     */
    public function limit($limit) : Repository
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * Must be of format ['column' => 'direction']
     *
     * @param  array $order
     * @return Repository
     */
    public function orderBy($order)
    {
        // If I start getting it wrong too many times, add validation here on the array format
        $this->sorts = $order;
        return $this;
    }

    /**
     * Populates the current repository with its corresponding model
     *
     * @return BaseModel
     */
    protected function makeModel() {
        $model = $this->app->make($this->model());
 
        if (!$model instanceof Model)
            throw new RepositoryException("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
 
        return $this->model = $model;
    }

}