<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id', 'user_id'
    ];  

    protected $dates = ['published_at'];

    protected $appends = ['published_date'];  // appends agrega una propiedad a la consulta de eloquent

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // public function setTitleAttribute($title)
    // {
    //     $slug = Str::slug($title);
    //     $duplicateSlugCount = Post::where('slug','LIKE',"{$url}%")->count();

    //     if($duplicateSlugCount)
    //     {
    //         $slug .= "-" . ++$duplicateSlugCount;
    //     }
    //     $this->attributes['slug'] = $slug;
        
    //     $this->attributes['title'] = $title;
    // }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category)
    {
        $this->attributes['category_id'] = Category::find($category) ? $category : Category::create(['name' => $category])->id;
    }

    public function syncTags($tags)
    {
        $tagIds = collect($tags)->map(function($tag){
            return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
        });

        return $this->tags()->sync($tagIds);
    }

    public function scopePublished($query)
    {
        $query->with(['owner','category','tags','photos']) // Array de relaciones que precargaran en la consulta a la BD
                ->whereNotNull('published_at')
                ->where('published_at','<=',Carbon::now())
                ->latest('published_at');   
    }

    public function scopeAllowed($query)
    {
        
        // El método can() viene de PostPolicy

        if( auth()->user()->can('view', $this) )
        {
            return $query; // Si posee el permiso view no agrega restricción al query, muestra todo los posts
        }
        return $query->where('user_id', auth()->id()); // Caso contrario retorna a los posts que tengan el mismo id que el usuario autenticado
    }

    public function isPublished()
    {
        return ! is_null($this->published_at) && $this->published_at < today();
    }

    protected static function boot()
    {
        parent::boot();

        // Se ejecutará cuando haya un delete() en el post
        static::deleting(function($post){
            $post->tags()->detach();

            // Llama el método each(function($photo) { $photo->delete() }); para cada photo
            $post->photos->each->delete();  
        });
    }

    public static function create($attributes = [])
    {
        // Agrega el user id al array de atributos
        $attributes['user_id'] = auth()->id();
        
        $post = static::query()->create($attributes);
        
        $post->generateSlug();

        return $post;

    }

    public function generateSlug()
    {
        $slug = Str::slug($this->title);

        if($this->where('slug', $slug)->exists())
        {
            $slug = "{$slug}-{$post->id}";
        }

        $this->slug = $slug;
        $this->save();

    }
    // Accesor para published_date, el valor que retornará la nueva variable
    public function getPublishedDateAttribute()
    {   
        // La funcion optional() es para que no falle en caso de que el dato sea null
        return optional($this->published_at)->format('M-d-Y'); // Este valor retornara la fecha formateada en al frontend
    }
}
