<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    protected $fillable = ['title', 'slug', 'content', 'is_original', 'published_at'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    protected $appends = [
        'snippet',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', new Carbon())
            ->orderBy('published_at', 'desc');
    }

    public function getRenderedAttribute()
    {
        return (new \Parsedown())->text($this->content);
    }

    public function getPublishedAtHumanAttribute()
    {
        return (new Carbon($this->published_at))->format('jS F, Y');
    }

    public static function findBySlug($slug)
    {
        return Post::whereSlug($slug)->firstOrFail();
    }

    public function shouldBeSearchable()
    {
        return ! empty($this->published_at);
    }

    public function getSnippetAttribute()
    {
        if (strlen($this->content) >= 200) {
            return substr($this->content, 0, 200).'...';
        } else {
            return $this->content;
        }
    }
}
