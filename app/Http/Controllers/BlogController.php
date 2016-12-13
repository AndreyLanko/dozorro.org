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

    public function index()
    {
        $posts = $this->blog->getPublishedPosts();
        $banner = null;

        foreach($posts AS $post)
        {
            if($post->is_main)
            {
                $banner = $post;
                break;
            }
        }

        $tenders = ActualTender::getAllActualTenders(['limit' => 3]);

        return $this->render('pages/blog/index', [
            'posts' => $posts,
            'banner' => $banner,
            'tenders' => $tenders,
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
        $blocks = new App\Classes\Longread($blocks, $post->id);

        $latest_posts = $this->blog->getPublishedPosts(['limit' => 3, 'is_main' => false]);
        $banner = $this->blog->getPublishedPosts(['limit' => 1, 'is_main' => true]);
        $tenders = ActualTender::getAllActualTenders(['limit' => 3]);

        return $this->render('pages/blog/show', [
            'post' => $post,
            'banner' => $banner,
            'latest_posts' => $latest_posts,
            'blocks' => $blocks->getBlocks(),
            'tenders' => $tenders,
        ]);
    }
}
