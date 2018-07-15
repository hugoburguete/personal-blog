<?php
namespace ProgrammingBlog\Repositories;

use ProgrammingBlog\Models\Category;
use ProgrammingBlog\Models\BaseModel;
use ProgrammingBlog\Repositories\Traits\SluggableRepositoryTrait;

class CategoryRepository extends Repository
{
	use SluggableRepositoryTrait;

	/**
	 * {@inheritDoc}
	 */
    function model()
    {
        return Category::class;
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
}