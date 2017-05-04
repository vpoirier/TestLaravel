<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Mark;

class MarkController extends Controller
{

    public function addMark(){
    	$idPost = request('id_post');
    	$idUser = request('id_user');
    	$valueMark = request('valueMark');
    	$mark = Mark::where('id_post', '=', $idPost)->where('id_user', '=', $idUser)->first();
    	
    	if($mark){
    		$mark->update(['value' => $valueMark]);
    	} else {
    		$mark = new Mark;
	    	$mark->value = $valueMark;
	    	$mark->id_post = $idPost;
	    	$mark->id_user = $idUser;
	    	$mark->save();
    	}
    
    	return redirect('/seeposts');
    }
}
