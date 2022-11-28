<?php

namespace Nortta\Laravel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nortta\Laravel\Factories\PageFactory;

class Page extends Model
{
    use HasFactory;

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

    protected static function newFactory()
    {
        return PageFactory::new();
    }
}
