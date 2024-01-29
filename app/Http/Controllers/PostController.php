<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;
use Inertia\Inertia;
use Inertia\Response;



class PostController extends Controller
{
  public function index(): Response
  {
    $posts = PostResource::collection(Post::all());
    //$posts = PostResource::collection(Post::factory(30)->make());

    return Inertia::render('Admin/Posts/PostIndex', [
      'posts' => PostResource::collection($posts)
    ]);
  }

  public function create(): Response
  {
    return Inertia::render('Admin/Posts/Create');
  }

  public function store(CreatePostRequest $request): RedirectResponse
  {
    Post::create($request->validated());

    return to_route('post.index');
  }

  public function edit(Post $post): Response
  {
    //$post = Post::findOrFail($id);
    return Inertia::render(
      'Admin/Posts/Edit',
      ['post' => new PostResource($post)]
    );
  }

  public function update(Request $request, Post $post): RedirectResponse
  {
    $request->validate([
      'title' => ['required', 'string', 'max:100', 'min:2'],
      'content' => ['required', 'string', 'max:500', 'min:5'],
    ]);

    $post->update([
      'title' => $request->title,
      'content' => $request->content
    ]);
    
    return to_route('post.index');

  }

  public function destroy(Post $post): RedirectResponse{
    $post->delete();
    return to_route('post.index');
  }
}
