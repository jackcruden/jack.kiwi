<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'slug', 'link', 'content', 'published_at', 'tag_id'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
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
}
