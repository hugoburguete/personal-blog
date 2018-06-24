<?php
namespace ProgrammingBlog\Repositories;

use ProgrammingBlog\Models\Post;

class PostRepository extends Repository
{
	/**
	 * {@inheritDoc}
	 */
    function model()
    {
        return Post::class;
    }
}