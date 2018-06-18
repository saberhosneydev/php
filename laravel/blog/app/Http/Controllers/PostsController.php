<?php

namespace App\Http\Controllers;

use App\post;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['index', 'show', 'catIndex', 'catShow', 'search']);
    }
    public function index () {
    	$posts = post::latest()->get();
    	$hotpost = post::where('hot', '1')->orderBy('id', 'desc')->first();
    	return view('posts.index', compact('posts', 'hotpost'));
    }
    public function show ($slug) {
    	$post = post::where('slug', $slug)->first();
    	return view('posts.show', compact('post'));
    }
    public function catShow ($category) {
        $posts = post::where('category', $category)->get();
        return view('category.show', compact('posts'));
    }
    public function catIndex () {
        $categories = post::pluck('category');
        $collection = collect($categories);
        $cats = $collection->unique()->values()->all();
        return view('category.index', compact('cats'));
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

        // Post::create([
        //     'title' => request('title'),
        //     'body' =>request('body'),
        //     'summary' => request('summary'),
        //     'category' => request('category'),
        //     'iamge' => request('image'),
        //     'hot' => request('hot'),
        //     'user_id' => auth()->user()->id()
        // ]);
    	$post = new Post;

    	$post->title = request('title');
    	$post->body = request('body');
    	$post->summary = request('summary');
    	$post->category = request('category');
    	$post->image = request('image');
    	$post->hot = request('hot');
    	$post->slug = str_slug(request('title'), '-');
        $post->user_id = auth()->id();

    	$post->save();

    	return redirect('/');
    	// dd(request()->all());
    }
    public function search() {

    }
}