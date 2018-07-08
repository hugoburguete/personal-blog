<?php

namespace ProgrammingBlog\Http\Controllers\Post;

use ProgrammingBlog\Http\Controllers\Controller;
use ProgrammingBlog\Models\Post;
use ProgrammingBlog\Models\Category;
use ProgrammingBlog\Repositories\CategoryRepository;
use ProgrammingBlog\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Post Repository
     *
     * @var PostRepository
     */
    private $postRepository;

    /**
     * Category Repository
     *
     * @var CategoryRepository
     */
    private $categoryRepository;

    public function __construct(PostRepository $repo, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $repo;
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository
            ->include(['categories'])
            ->orderBy(['id' => 'desc'])
            ->all();

        return $this->reply('post.index', ['posts' => $posts]);
    }

    public function adminIndex()
    {
        $posts = $this->postRepository
            ->include(['categories'])
            ->orderBy(['id' => 'desc'])
            ->all();

        return $this->reply('dashboard.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = $this->categoryRepository->all();

        return $this->reply('dashboard.post.create', ['categories' => $allCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post($request->all());
        $post->save();

        if (!empty($request->input('category_name'))) {
            $category = $this->categoryRepository->create([
                    'name' => $request->input('category_name'),
                ]);
            $post->categories()->attach($category->id);
        } else {
            $post->categories()->attach($request->input('categoryId'));
        }
   
        $request->session()->flash('status', __('resource.status', ['resource' => 'post', 'status' => 'saved']));
        return $this->adminIndex();
    }

    /**
     * Display the specified resource.
     *
     * @param  \ProgrammingBlog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($post)
    {
        $post = $this->postRepository
            ->include(['categories'])
            ->get($post);

        return $this->reply('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ProgrammingBlog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $allCategories = $this->categoryRepository->all();

        return $this->reply('dashboard.post.edit', ['categories' => $allCategories, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ProgrammingBlog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->categories()->detach();
        $post->fill($request->all());
        $post->categories()->attach($request->input('categoryId'));
        $post->save();

        return $this->adminIndex();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ProgrammingBlog\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return $this->adminIndex();
    }
}
