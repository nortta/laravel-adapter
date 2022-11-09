<?php

namespace Nortta\Laravel;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'nortta_pages';

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id', 'uuid');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id', 'uuid');
    }
}
