<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post{
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public function __construct($title, $excerpt, $date, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
    }     

    public static function all(){
        $files = File::files(resource_path("posts/"));

        return array_map(function($file){
            return $file->getContents();
        }, $files);
    }

    public static function find($slug) {

        $path = resource_path("/posts/{$slug}.html");

        if (!file_exists($path)){
            //dd('file does not exist');
            //abort(404);
            throw new ModelNotFoundException();
        }
    
        return cache()->remember("posts.{$slug}", 1200, function() use($path){
            //var_dump('file_get_contents');
            return file_get_contents($path);
        }); 
    }
}