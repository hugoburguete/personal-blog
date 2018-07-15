<?php

namespace ProgrammingBlog\Http\Controllers\Post;

use Illuminate\Http\Request;
use ProgrammingBlog\Http\Controllers\Controller;
use ProgrammingBlog\Models\Category;
use ProgrammingBlog\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * This resource's repository
     *
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * Constructor
     *
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->reply('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $this->categoryRepository
            ->create($request->all());

        $request->session()->flash('status', __('resource.status', ['resource' => 'category', 'status' => 'saved']));
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \ProgrammingBlog\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($categoryId)
    {
        $category = $this->categoryRepository->get($categoryId);
        $posts = $category->posts;

        return $this->reply('category.show', [
                'posts'    => $posts, 
                'category' => $category
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ProgrammingBlog\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ProgrammingBlog\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ProgrammingBlog\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
