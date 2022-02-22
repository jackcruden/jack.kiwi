<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'embed_url', 'image', 'content', 'is_original', 'published_at'];

    protected $appends = ['link'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', new Carbon())
            ->orderBy('published_at', 'desc');
    }

    public function scopeProject($query)
    {
        return $query->whereHas('tags', function ($query) {
            return $query->whereSlug('project');
        });
    }

    public function scopeSketch($query)
    {
        return $query->whereHas('tags', function ($query) {
            return $query->whereSlug('sketch');
        });
    }

    public function scopeBlog($query)
    {
        return $query->whereHas('tags', function ($query) {
            return $query->whereSlug('blog');
        });
    }

    public function getMinutesToReadAttribute()
    {
        return max(round(str_word_count($this->content) / 200), 1);
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
        $type = 'blog';
        if ($this->tags()->whereSlug('project')->count()) {
            $type = 'projects';
        } elseif ($this->tags()->whereSlug('sketch')->count()) {
            $type = 'sketches';
        }

        return config('app.url').'/'.$type.'/'.$this->slug;
    }

    public function getImageThumbnailAttribute()
    {
        return preg_replace('/\./', '.thumbnail.', $this->image, 1);
    }

    public static function findBySlug($slug)
    {
        return self::whereSlug($slug)->firstOrFail();
    }

    public static function getAllFeedItems()
    {
        return self::published()->get();
    }

    /**
     * TODO
     *
     * @return mixed
     */
//    public function toFeedItem()
//    {
//        return FeedItem::create()
//            ->id($this->id)
//            ->title($this->title)
//            ->summary($this->rendered)
//            ->updated($this->published_at)
//            ->link($this->link)
//            ->author('Jack Cruden');
//    }
}
