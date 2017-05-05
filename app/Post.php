<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'body',
        'author',
        'id',
        'created_at'
    ];

    public function getAverageMark(){
    	$marks = $this->hasMany('App\Mark', 'id_post')->get();

    	if(!count($marks)){
    		return 'Aucune note enregistrée';
    	}
    	$averageMark = 0;
   		foreach ($marks as $mark) {
   			$averageMark += $mark->value;
   		}
   		$averageMark /= count($marks);
	// comment master
	return round($averageMark, 2)."/5";

    }
}
