<?php

namespace App\Http\Controllers;

use App\post;

class PostsController extends Controller
{
    public function index () {
    	$posts = post::all();
    	$hotpost = post::where('hot', '1')->orderBy('id', 'desc')->first();
    	return view('posts.index', compact('posts', 'hotpost'));
    }
    public function show (Post $post) {
    	return view('posts.show', compact('post'));
    }
}