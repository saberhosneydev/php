<?php

namespace App\Http\Controllers;

use App\post;
use Illuminate\Http\Request;

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
    public function create () {
    	return view('posts.create');
    }
    public function store () {

    	$this->validate(request(), [
    		'title' => 'required',
    		'body' => 'required',
    		'summary' => 'required',
    		'category' => 'required',
    		'image' => 'required',
    		'hot' => 'required',
    	]);
    	$post = new Post;

    	$post->title = request('title');
    	$post->body = request('body');
    	$post->summary = request('summary');
    	$post->category = request('category');
    	$post->image = request('image');
    	$post->hot = request('hot');

    	$post->save();

    	return redirect('/');
    	// dd(request()->all());
    }
}