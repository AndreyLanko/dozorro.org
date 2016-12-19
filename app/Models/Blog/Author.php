<?php

namespace App\Models\BLog;

use Illuminate\Database\Eloquent\Model;
use App\File;

/**
 * Class Author
 * @package App
 */
class Author extends Model
{

    /**
     * @var string
     */
    protected $table = 'perevorot_blog_authors';

    protected $backendNamespace = 'Perevorot\Blog\Models\Author';

    public function photo()
    {
        $file = File::where('attachment_type', $this->backendNamespace)
            ->where('attachment_id', $this->id)
            ->where('field', 'photo')
            ->orderBy('id', 'DESC')
            ->first();

        if($file)
        {
            return $file = env('BACKEND_URL') . $file->getPath();
        }
        else
        {
            return '';
        }
    }
}