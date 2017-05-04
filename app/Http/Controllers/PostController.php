<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Repositories\PostRepository;

class PostController extends Controller
{

   public function __construct(){
      $this->middleware('auth');
   }
  
   public function getAllPosts(){
		$parameter = request('orderBy');
      $posts = PostRepository::getPostsBy($parameter);

   	return view('/visualize', compact('posts'));
   }

   public function create(){
      $user = Auth::user();
   	$post = new Post;
   	$post->title = request('title');
   	$post->body = request('body');
   	$post->author = $user->name;
   	$post->save();

		return redirect('/home');
   }

   public function delete(Post $post){
		$post->delete();

		return $this->getAllPosts();
   }

   public function showPostToEdit(Post $post){ 
		return redirect('/editpost')->with('post', $post);
   }

   public function edit(Post $post){
		$post->title = request('title');
		$post->body = request('body');
		$post->save();
      
		return $this->getAllPosts();
   }

}
