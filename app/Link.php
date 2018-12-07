<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['name', 'url', 'hits'];

    protected $appends = ['link'];

    public function getLinkAttribute()
    {
        return config('app.url').'/'.$this->name;
    }

    public function hit()
    {
        $this->update(['hits' => $this->hits + 1]);

        return $this->hits;
    }
}
