<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	protected $fillable = [
        'name', 'board_id', 'priorty', 'completed'
    ];
	public function project(){
		return $this->belongsTo('App\Project');
	}
}
