<?php

namespace App\Http\Controllers;

use App\post;
use App\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store ($slug) {
    	$post = post::where('slug', $slug)->first();
    	$this->validate(request(), [
    		'body' => 'required'
    	]);
    	$comment = new Comment;

    	$comment->body = request('body');
    	$comment->post_id = $post->id;
        $comment->user_id = auth()->id();

    	$comment->save();

        return back();
    }
}
