<?php

namespace App;

use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function comments() {
    	return $this->hasMany(Comment::class);
    }
    public static function countCat($catname) {
    	return Post::where('category', $catname)->count();
    }
}
