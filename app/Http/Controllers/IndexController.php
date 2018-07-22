<?php

namespace ProgrammingBlog\Http\Controllers;

use ProgrammingBlog\Http\Controllers\Controller;
use ProgrammingBlog\Repositories\PostRepository;

class IndexController extends Controller
{
    /**
     * Post Repo
     *
     * @var PostRepository
     */
    public $postRepository;

    /**
     * Constructor
     *
     * @param  PostRepository $postRepository 
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $pageSlug = 'index-page';
        $posts = $this->postRepository
            ->include('categories')
            ->all();
        return $this->reply('index.index', ['posts' => $posts, 'pageSlug' => $pageSlug]);
    }
}
