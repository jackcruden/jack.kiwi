<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'is_original', 'published_at'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', new Carbon());
    }

    public function getRenderedAttribute()
    {
        return (new \Parsedown())->text($this->content);
    }
}
