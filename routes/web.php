<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {

    $posts = Post::all();

    return view('posts', [
        'posts' => $posts
    ]);
}); */ 

Route::get('/', function () {

    //$object = YamlFrontMatter::parse(file_get_contents('example.md'));
    //$document = YamlFrontMatter::parseFile(resource_path('posts/04post.html'));
    $posts = Post::all();

    /* $posts = array_map(function($file){
        $document = YamlFrontMatter::parseFile($file);
        return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
    }, $files); */

    return view('posts', [
        'posts' => $posts
    ]);
}); 

Route::get('posts/{post}', function ($slug) {

    $post = Post::find($slug);

    return view('post',[
        'post' => $post
    ]);
})->whereAlphaNumeric('post');  
