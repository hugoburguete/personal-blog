<?php

namespace ProgrammingBlog\Console\Commands;

use Illuminate\Console\Command;
use ProgrammingBlog\Models\Post;
use ProgrammingBlog\Repositories\CategoryRepository;
use ProgrammingBlog\Repositories\PostRepository;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a sitemap file';

    /**
     * The xml date format.
     *
     * @var string
     */
    const XML_DATE_FORMAT = 'Y-m-d';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Create base document
        $baseXml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>';
        $xml = new \SimpleXMLElement($baseXml);

        // Index page
        $this->info('Generating index url');
        $url = $xml->addChild('url');
        $url->addChild('loc', url('/'));
        $lastPost = Post::latest()->first();
        $url->addChild('lastmod', $lastPost->created_at->format(self::XML_DATE_FORMAT));
        $url->addChild('changefreq', 'monthly');
        
        // Category pages
        $this->info('Generating category page urls');
        $categoryRepo = resolve(CategoryRepository::class);
        $categories = $categoryRepo->include('posts')->all(['slug', 'id']);
        foreach ($categories as $category) {
            $catXml = $xml->addChild('url');
            $catXml->addChild('loc', url('/category/' . $category->slug));
            $latestCategoryPost = $category->posts->sortBy('updated_at')->first();
            $catXml->addChild('lastmod', $latestCategoryPost->updated_at->format(self::XML_DATE_FORMAT));
            $catXml->addChild('changefreq', 'monthly');
        }
        
        // Post pages
        $this->info('Generating post urls');
        $postRepo = resolve(PostRepository::class);
        $posts = $postRepo->all(['slug', 'updated_at']);
        foreach ($posts as $post) {
            $postXml = $xml->addChild('url');
            $postXml->addChild('loc', url('/post/' . $post->slug));
            $postXml->addChild('lastmod', $post->updated_at->format(self::XML_DATE_FORMAT));
            $postXml->addChild('changefreq', 'monthly');
        }

        // Store the xml file
        $this->info('Storing sitemap');
        try {
            $fileHandle = fopen(public_path() . '/sitemap.xml', 'w');
            fwrite($fileHandle, $xml->asXML());
            fclose($fileHandle);
        } catch (\Exception $e) {
            $this->error('Cannot write to path. ' . $e->getMessage());
        }
    }
}
