<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'perevorot_page_page';

    public function children()
    {
        return Page::where('nest_left', '>', $this->nest_left)
            ->where('nest_right', '<', $this->nest_right)
            ->where('nest_depth', $this->nest_depth + 1)
            ->where('is_hidden', false)
            ->where('is_disabled', false)
            ->orderBy('nest_left')
            ->get()
        ;
    }
}
