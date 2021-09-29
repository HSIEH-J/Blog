<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;

Route::get('/', function () {

    //n+1 issue

    //1.
    // \Illuminate\Support\Facades\DB::listen(function($query){
    //     logger($query->sql, $query->bindings);
    // });

    //2.
    //laravel clowork

    // return view('posts.posts', [
    //     //if you want to load all posts with the responding category => use with category
    //     //-----Eager loading-----
    //     //result => SELECT * FROM `categories` WHERE `categories`.`id` in (1, 2, 3)
    //     'posts' => Post::with('category')->get() //use get() to get data
    // ]);

    return view('posts.posts', [
        'posts' => Post::where('user_id', Auth::id())->get()
    ]);

})->middleware('auth');


Route::get('posts/{post}', function (Post $post) {

    //Find a post by its id and pass it to a view called "post"
    return view('posts.post', [
        'post' => $post
    ]);

})->middleware('auth');

//restrict params ----->
//->where('post', '[A-z_＼-]+');

Route::get('create', [PostController::class, 'create']);

Route::post('create', [PostController::class, 'store']);

Route::get('edit/{post}', function (Post $post) {
    return view('posts.edit', [
        'post' => $post
    ]);
})->middleware('auth');

Route::post('edit', [PostController::class, 'update']);

Route::get('delete/{id}', [PostController::class, 'delete']);

Auth::routes();

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts.posts', [
//         'posts' => $category->posts
//     ]);
// });
