<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //check req.body
        //return request()->all();

        //create the post
        request()->validate([
            'title' => 'required|max:255',
            'user_id' => 'Auth::id()',
            'excerpt' => 'required|max:255',
            'body' => 'required|max:255'
        ]);

        Post::create([
            'title' => request()->title,
            'user_id' => Auth::id(),
            'excerpt' => request()->excerpt,
            'body' => request()->body
        ]);

        return redirect('/');
    }

    public function update()
    {
        //return request()->all();

        Post::where('id', '=', request()->id)->update([
            'title' => request()->title,
            'excerpt' => request()->excerpt,
            'body' => request()->body
        ]);

        return redirect('/');
    }

    public function delete($id)
    {
        //return request()->all();

        Post::where('id', '=', $id)->delete();

        return redirect('/');
    }

    public function findPost($query)
    {
        return $query->where('user_id', '=', Auth::id());
    }

}
