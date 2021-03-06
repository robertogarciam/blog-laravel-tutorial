<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post{
    public $title;

    public $excerpt;

    public $date;

    public $body;
    
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }        

    public static function all(){
        /* $files = File::files(resource_path("posts/"));

        return array_map(function($file){
            return $file->getContents();
        }, $files); */
        //$files = File::files(resource_path("posts"));    

        return collect(File::files(resource_path("posts")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                    )
                )
                ->sortByDesc('date');      
    }

    public static function find($slug) {

        /* $path = resource_path("/posts/{$slug}.html");

        if (!file_exists($path)){
            //dd('file does not exist');
            //abort(404);
            throw new ModelNotFoundException();
        }
    
        return cache()->remember("posts.{$slug}", 1200, function() use($path){
            //var_dump('file_get_contents');
            return file_get_contents($path);
        }); */ 

        //Of all the blog posts, find the one with a slug that matches the one that was requested

        $posts = static::all();

        return $posts->firstWhere('slug', $slug); 
    }
}