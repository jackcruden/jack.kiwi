<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'title', 'slug', 'embed_url', 'content', 'published_at'];

    protected $casts = [
        'type' => PostType::class,
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc');
    }

    public function scopeProject($query)
    {
        return $query->whereType(PostType::Project);
    }

    public function scopeSketch($query)
    {
        return $query->whereType(PostType::Sketch);
    }

    public function scopeBlog($query)
    {
        return $query->whereType(PostType::Blog);
    }

    /**
     * Number of minutes it will take to read.
     *
     * @return int
     */
    public function getMinutesToReadAttribute(): int
    {
        return max(round(str_word_count($this->content) / 200), 1);
    }

    /**
     * Markdown rendered to HTML.
     *
     * @return string
     */
    public function getRenderedAttribute(): string
    {
        return (new \Parsedown())->text($this->content);
    }

    /**
     * The date the post was published.
     *
     * @return string
     */
    public function getPublishedAtHumanAttribute(): string
    {
        return (new Carbon($this->published_at))->format('jS F, Y');
    }

    /**
     * A snippet of the post.
     *
     * @return string
     */
    public function getSnippetAttribute(): string
    {
        if (strlen($this->content) >= 200) {
            return substr($this->content, 0, 200).'...';
        } else {
            return $this->content;
        }
    }

    /**
     * The link to the post.
     *
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return match ($this->type) {
            PostType::Project => route('projects.show', $this->slug),
            PostType::Sketch => route('sketches.show', $this->slug),
            PostType::Blog => route('blog.show', $this->slug),
        };
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
