<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;

class Project extends Model implements Feedable
{
    protected $fillable = ['title', 'slug', 'image', 'link', 'content', 'published_at', 'tag_id'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
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

    public function getSnippetAttribute()
    {
        if (strlen($this->content) >= 200) {
            return substr($this->content, 0, 200).'...';
        } else {
            return $this->content;
        }
    }

    public function getLinkAttribute()
    {
        return config('app.url').'/projects/'.$this->slug;
    }

    public static function getAllFeedItems()
    {
        return Project::published()->get();
    }

    public function toFeedItem()
    {
        return FeedItem::create()
            ->id($this->id)
            ->title($this->title)
            ->summary($this->rendered)
            ->updated($this->published_at)
            ->link($this->link)
            ->author('Jack Cruden');
    }
}
