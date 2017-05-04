<?php

namespace App\Repositories;

use App\Post;

class PostRepository {

	public static function getPostsBy($parameter){
		if($parameter == null){
			$parameter = 'created_at';
		}
		if($parameter == "mark"){
	        $posts = Post::all()->sortBy(function($post){
                return $post->getAverageMark();
            });
        } else {
            $posts = Post::orderBy($parameter)->get();
        }
        return $posts;
	}
}