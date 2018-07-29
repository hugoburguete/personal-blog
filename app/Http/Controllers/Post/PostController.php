<?php

namespace ProgrammingBlog\Http\Controllers\Post;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use ProgrammingBlog\Http\Controllers\Controller;
use ProgrammingBlog\Models\Post;
use ProgrammingBlog\Models\Category;
use ProgrammingBlog\Repositories\CategoryRepository;
use ProgrammingBlog\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    use SEOToolsTrait;

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

    /**
     * Constructor
     */
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
        // Save post
        $post = new Post($request->all());

        // Store image
        // TODO: Image resizing - there's a cool library here: https://github.com/gumlet/php-image-resize. Give that
        // a shot.
        $thumbnail = $request->file('thumbnail');
        if (!empty($thumbnail)) {
            $extension = $thumbnail->extension();
            $path = $thumbnail->storeAs(
                'public/thumbnails', 'thumbnail-' . $post->id . '.' .$extension
            );

            $post->thumbanil_url = $path;
        }

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
        return redirect()->route('admin.index');
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

        if (empty($post)) {
            abort(404);
        }

        $this->seo()->setTitle($post->title);
        $this->seo()->setDescription($post->slug);
        $this->seo()->metatags()->addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
        if (!$post->categories->isEmpty()) {
            $this->seo()->metatags()->addMeta('article:section', $post->categories->first()->name, 'property');
        }
        $this->seo()->metatags()->addKeyword($post->keywords);

        $this->seo()->opengraph()->setDescription($post->short_description);
        $this->seo()->opengraph()->setTitle($post->title);
        // $this->seo()->opengraph()->setUrl('http://current.url.com');
        $this->seo()->opengraph()->addProperty('type', 'article');
        $this->seo()->opengraph()->addProperty('locale', app()->getLocale());

        // $this->seo()->opengraph()->addImage($post->cover->url);
        // $this->seo()->opengraph()->addImage($post->images->list('url'));
        // $this->seo()->opengraph()->addImage(['url' => 'http://image.url.com/cover.jpg', 'size' => 300]);
        // $this->seo()->opengraph()->addImage('http://image.url.com/cover.jpg', ['height' => 300, 'width' => 300]);

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

        return redirect()->route('admin.index');
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

        return redirect()->route('admin.index');
    }
}
