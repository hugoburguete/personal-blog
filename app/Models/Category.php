<?php

namespace ProgrammingBlog\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use ProgrammingBlog\Models\BaseModel;
use ProgrammingBlog\Models\Post;

class Category extends BaseModel
{
	use Sluggable;

	/**
	 * Posts relationship
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function posts()
    {
    	return $this->belongsToMany(Post::class, 'post_categories');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
}
