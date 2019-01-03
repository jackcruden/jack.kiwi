<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'slug'];

    public function project()
    {
        return $this->hasOne(Project::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
