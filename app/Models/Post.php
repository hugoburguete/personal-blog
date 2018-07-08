<?php

namespace ProgrammingBlog\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use ProgrammingBlog\Models\BaseModel;
use ProgrammingBlog\Models\Category;

class Post extends BaseModel
{
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content' 
    ];

    /**
     * Category relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }

    /**
     * Scope a query to sort by latest posts.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    // public function scopeLatest($query)
    // {
    //  return $query->orderBy('created_at');
    // }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
