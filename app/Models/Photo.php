<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        // Cada vez que se elimine la foto, irá al disco public y elimina la foto del servidor
        static::deleting(function($photo){
            Storage::disk('public')->delete($photo->url);   
        });
    }
}
