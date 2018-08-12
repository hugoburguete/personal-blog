<?php

namespace ProgrammingBlog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use ProgrammingBlog\Http\Controllers\Controller;
use ProgrammingBlog\Repositories\PostRepository;

class DashboardController extends Controller
{
    /**
     * Posts repository
     *
     * @var PostRepository
     */
    public $postRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->middleware('auth');
        $this->postRepository = $postRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository
            ->include(['categories'])
            ->orderBy(['id' => 'desc'])
            ->paginate(10)
            ->all();

        return $this->reply('dashboard.post.index', ['posts' => $posts]);
    }
}
