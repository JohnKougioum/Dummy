<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post, Request $request){
        // dd($post->id);

        $this->validate($request, [
            'body' => 'required'
        ]);

        // $request->user()->posts()->comments()->create($request->only('body'));

        $post->comments()->create([
            'user_id' => $request->user()->id,
            'post_id' => $post->id,
            'body' => $request->body
        ]);

        return back();
    }
}
