<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
use Inertia\Inertia;
use Inertia\Response;



class PostController extends Controller
{
    public function index(): Response {
       //$posts = PostResource::collection(Post::all());
         $posts = PostResource::collection(Post::factory(30)->make());
 
        return Inertia::render('Admin/Posts/PostIndex', [ 
          'posts' =>PostResource::collection($posts)
        ]);
    }
}
