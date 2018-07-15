<?php
namespace ProgrammingBlog\Repositories;

use ProgrammingBlog\Models\Post;
use ProgrammingBlog\Models\BaseModel;
use ProgrammingBlog\Repositories\Traits\SluggableRepositoryTrait;

class PostRepository extends Repository
{
    use SluggableRepositoryTrait;

	/**
	 * {@inheritDoc}
	 */
    function model()
    {
        return Post::class;
    }

    /**
     * {@inheritdoc}
     */
    public function get($id) : ?BaseModel
    {
        $record = $this->getModel()->find($id);
        if (empty($record)) {
            // Try to find it by slug
            $record = $this->getBySlug($id);
        }
        return $record;
    }

    /**
     * Retrieves the latest articles
     *
     * @param  integer $count the number of articles to return
     * @return Collection
     */
    public function getRecent($count = 3)
    {
    	return $this->getModel()->latest()
    		->limit($count)
    		->get();
    }
}