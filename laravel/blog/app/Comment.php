<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post() {
    	return $this->belongsTo(Post::class);
    }
    // protected $fillable = ['body'];

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
