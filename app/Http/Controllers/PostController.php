<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;



class PostController extends Controller
{
    public function index(Request $request){
       //$posts = PostResource::collection(Post::all());
         $posts = PostResource::collection(Post::factory(30)->make());
      // $posts = Post::all();
        return inertia('Posts/Index', compact('posts'));
    }
}
