<?php

namespace ProgrammingBlog\Models;

use ProgrammingBlog\Models\BaseModel;
use ProgrammingBlog\Models\Category;

class Post extends BaseModel
{
	/**
	 * Category relationship
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
    public function categories()
    {
    	return $this->belongsToMany(Category::class, 'post_categories');
    }
}
