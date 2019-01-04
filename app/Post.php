<?php

namespace App;

use Carbon\Carbon;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;

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

    public function getPublishedAtHumanAttribute()
    {
        return (new Carbon($this->publised_at))->format('jS F, Y');
    }

    public static function findBySlug($slug)
    {
        return Post::whereSlug($slug)->firstOrFail();
    }

    public function shouldBeSearchable()
    {
        return ! empty($this->published_at);
    }
}
