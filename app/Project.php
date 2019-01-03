<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'slug', 'link', 'content', 'published_at', 'tag_id'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
