<?php
namespace ProgrammingBlog\Repositories\Traits;

use ProgrammingBlog\Models\BaseModel;

trait SluggableRepositoryTrait
{
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
}