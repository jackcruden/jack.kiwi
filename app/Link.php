<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['name', 'url', 'hits'];

    public function hit()
    {
        $this->update(['hits' => $this->hits + 1]);
        // $this->hits = $this->hits + 1;
        // $this->save();

        return $this->hits;
    }
}
