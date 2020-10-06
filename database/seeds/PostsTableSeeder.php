<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
        
        Post::truncate();
        Category::truncate();
        Tag::truncate();

        $category = new Category;
        $category->name = "Categoría 1";
        $category->slug = Str::slug("Categoría 1");
        $category->color = "28B5C9";
        $category->save();

        $category = new Category;
        $category->name = "Categoría 2";
        $category->slug = Str::slug("Categoría 2");
        $category->color = "D52F32";
        $category->save();

        $post = new Post;
        $post->title = "Mi primer post";
        $post->slug = Str::slug("Mi primer post");
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->category_id = 1;
        $post->user_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Mi segundo post";
        $post->slug = Str::slug("Mi segundo post");
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Contenido de mi segundo post</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 2;
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name'=>'Etiqueta3', 'slug' => Str::slug('Etiqueta3')]));
        $post->tags()->attach(Tag::create(['name'=>'Etiqueta4', 'slug' => Str::slug('Etiqueta4')]));

        $post = new Post;
        $post->title = "Mi tercer post";
        $post->slug = Str::slug("Mi tercer post");
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 2;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name'=>'Etiqueta1', 'slug' => Str::slug('Etiqueta1')]));


        $post = new Post;
        $post->title = "Mi cuarto post";
        $post->slug = Str::slug("Mi cuarto post");
        $post->excerpt = "Extracto de mi cuarto post";
        $post->body = "<p>Contenido de mi cuarto post</p>";
        $post->published_at = Carbon::now();
        $post->category_id = 1;
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name'=>'Etiqueta2','slug' => Str::slug('Etiqueta2')]));
    }
}
