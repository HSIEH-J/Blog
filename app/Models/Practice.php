<?php

namespace App\Models;

use File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title,$excerpt,$date,$body,$slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        //Get cache ----->
        //cache()->get('posts.all'); OR cache('posts.all');
        //Delete cache ----->
        //cache()->forget('posts.all);
        //Set cache ----->  
        //cache()->put('foo','bar'); OR cache(['foo' => 'buzz'], now()->addSeconds(3));
        return cache()->rememberForever('posts.all',function(){
            return collect(File::files(resource_path("posts")))
            ->map(function($file){
                $document = YamlFrontMatter::parseFile($file);
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
                ); 
            })
            ->sortBy('date');
        });

    }

    public static function find($slug)
    {
       //of all the blog posts, find the one with a slug that matches the one that was requested.
       return static::all()->firstWhere('slug', $slug);
    }

}