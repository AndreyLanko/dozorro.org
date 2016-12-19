<?php

namespace App\Http\Controllers;

use App\Models\Blog\Blog;
use Illuminate\Http\Request;
use App;
use App\ActualTender;

class BlogController extends BaseController
{
    public $blog;

    public function __construct()
    {
        $this->blog = new Blog();
    }

    public function byAuthor($slug = null)
    {
        return $this->index(null, $slug);
    }

    public function byTag($slug = null)
    {
        return $this->index($slug, null);
    }

    public function index($tag = null, $author = null)
    {
        $posts = $this->blog->getPublishedPosts(['tag' => $tag, 'author' => $author, 'is_main' => false]);
        $main = $this->blog->getPublishedPosts(['limit' => 1, 'is_main' => true]);
        $latest_posts = $this->blog->getPublishedPosts(['limit' => 3]);
        $tenders = ActualTender::getAllActualTenders(['limit' => 3]);

        return $this->render('pages/blog/index', [
            'posts' => $posts,
            'main' => (isset($main->id) ? $main : false),
            'tenders' => $tenders,
            'latest_posts' => $latest_posts,
        ]);
    }

    public function show(Request $request, $slug)
    {
        if(!$slug)
        {
            return redirect()->route('page.blog');
        }

        $post = $this->blog->findBySlug($slug);

        if(!$post)
        {
            abort(404);
            return $this->render('errors/404', []);
        }

        $locale = (trim($request->route()->getPrefix(), '/'))?:App\Classes\Lang::getDefault();
        $blocks = (array) json_decode($post->{'longread_' . $locale});
        $blocks = new App\Classes\Longread($blocks, $post->id, $this->blog->backendNamespace);

        $latest_posts = $this->blog->getPublishedPosts(['limit' => 3]);
        $banner = $this->blog->getPublishedPosts(['limit' => 1, 'is_main' => true]);
        $tenders = ActualTender::getAllActualTenders(['limit' => 3]);

        return $this->render('pages/blog/show', [
            'post' => (isset($post->id) ? $post : false),
            'banner' => (isset($banner->id) ? $banner : false),
            'latest_posts' => $latest_posts,
            'blocks' => $blocks->getBlocks(),
            'tenders' => $tenders,
        ]);
    }
}
