<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use App\File;

/**
 * Class Blog
 * @package App
 */
class Blog extends Model
{
    /**
     * @var string
     */
    protected $table = 'perevorot_blog_posts';

    /**
     * Convert to native type
     *
     * @var array
     */
    protected $casts = ['is_enabled', 'is_main'];
    protected $dates = ['published_at'];

    public $backendNamespace = 'Perevorot\Blog\Models\Blog';

    public function author()
    {
        return $this->belongsTo('App\Models\Blog\Author');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Blog\Tags', 'perevorot_blog_tag_to_post', 'post_id', 'tag_id');
    }

    public function scopeIsEnabled($query)
    {
        return $query->where($this->table . '.is_enabled', true);
    }

    public function scopeIsMain($query, $data)
    {
        if($data !== null)
        {
            return $query->where($this->table . '.is_main', $data);
        }
    }

    public function scopeByTag($query, $data)
    {
        if($data !== null)
        {
            return $query
                ->join('perevorot_blog_tag_to_post', 'perevorot_blog_posts.id', '=', 'perevorot_blog_tag_to_post.post_id')
                ->join('perevorot_blog_tags', 'perevorot_blog_tag_to_post.tag_id', '=', 'perevorot_blog_tags.id')
                ->where('perevorot_blog_tags.slug', $data);
        }
    }

    public function scopeByAuthor($query, $data)
    {
        if($data !== null)
        {
            return $query
                ->join('perevorot_blog_authors', 'perevorot_blog_posts.author_id', '=', 'perevorot_blog_authors.id')
                ->where('perevorot_blog_authors.slug', $data);
        }
    }

    public function scopeLimit($query, $limit)
    {
        if($limit > 1)
        {
            return $query->take($limit)->get();
        }
        elseif($limit == 1)
        {
            return $query->first();
        }
        elseif(!$limit)
        {
            return $query->get();
        }
    }

    public function photo()
    {
        $file = File::where('attachment_type', $this->backendNamespace)
            ->where('attachment_id', $this->id)
            ->where('field', 'photo')
            ->orderBy('id', 'DESC')
            ->first();

        return $file = env('BACKEND_URL') . $file->getPath();
    }

    public function getPublishedPosts($params = [])
    {
        return self::select($this->table . '.*')
            ->isEnabled()
            ->isMain(@$params['is_main'])
            ->byTag(@$params['tag'])
            ->byAuthor(@$params['author'])
            ->orderBy('created_at', 'desc')
            ->limit(@$params['limit']);
    }

    public function findBySLug($slug)
    {
        return self::select('*')
            ->where('slug', $slug)
            ->first();
    }
}