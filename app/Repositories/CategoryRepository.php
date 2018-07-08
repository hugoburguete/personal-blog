<?php
namespace ProgrammingBlog\Repositories;

use ProgrammingBlog\Models\Category;
use ProgrammingBlog\Models\BaseModel;

class CategoryRepository extends Repository
{
	/**
	 * {@inheritDoc}
	 */
    function model()
    {
        return Category::class;
    }
}