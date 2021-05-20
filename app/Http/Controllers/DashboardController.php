<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $posts = auth()->user()->posts()->with(['user','likes'])->paginate(20);
        $user = auth()->user();

        return view('dashboard',[
            'user'=> $user,
            'posts'=> $posts
        ]);
    }
}
