<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{

	protected $fillable = [
		'name', 'project_id'
	];
    public function project(){
		return $this->belongsTo('App\Project');
	}
	public function tasks(){
		return $this->hasMany('App\Task');
	}
}
