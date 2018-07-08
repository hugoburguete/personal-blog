<?php
namespace ProgrammingBlog\Repositories;

use ProgrammingBlog\Models\Post;
use ProgrammingBlog\Models\BaseModel;

class PostRepository extends Repository
{
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
     * Finds a Post by slug
     *
     * @param  string $slug the slug to search for
     * @return BaseModel
     */
    public function getBySlug($slug) : ?BaseModel
    {
        return $this->getModel()
            ->where('slug', $slug)
            ->first();
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