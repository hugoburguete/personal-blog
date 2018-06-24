<?php

namespace ProgrammingBlog\Models;

use ProgrammingBlog\Models\BaseModel;
use ProgrammingBlog\Models\Post;

class Category extends BaseModel
{
	/**
	 * Posts relationship
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function posts()
    {
    	return $this->belongsToMany(Post::class, 'post_categories');
    }
}
