<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function setNameAttribute($name)
    {
       $this->attributes['name'] = $name;
       $this->attributes['slug'] = Str::slug($name); 
    }
}
