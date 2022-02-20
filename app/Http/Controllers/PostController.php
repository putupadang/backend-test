<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Http\Resources\UserResource;
use App\Models\Post;
use App\Models\PostReaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
  public function addPost(Request $request)
  {
    $request->validate([
      'description' => 'required|string',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $image = $request->image;
    $extension = $image->getClientOriginalExtension();
    $filename = rand(111, 99999) . date('Ymdhis') . '.' . $extension;
    $path = 'img/' . $filename;

    Storage::disk('local_storage')->put($path, file_get_contents($image));

    $post = new Post();
    $post->user_id = Auth::user()->id;
    $post->description = $request->description;
    $post->image = $path;
    $post->save();

    return response()->json(['status' => '200', 'message' => 'add feed successfully!'], 200);
  }

  public function getPost(Request $request)
  {
    $request->validate([
      'per_page' => 'required|integer',
    ]);

    $query = Post::orderBy('created_at', 'desc')->paginate($request->per_page);
    $posts = PostResource::collection($query);

    return response()->json(['status' => '200', 'return' => $posts->response()->getData(true)], 200);
  }

  public function getPostById($id = null)
  {
    $post = Post::find($id);
    if (!$post) {
      return response()->json(['status' => '404', 'message' => 'post not found!'], 404);
    }

    $post = new PostResource($post);
    return response()->json(['status' => '200', 'return' => $post], 200);
  }

  public function getPostLikes($id = null)
  {
    $post = Post::find($id);
    if (!$post) {
      return response()->json(['status' => '404', 'message' => 'post not found!'], 404);
    }

    $user = User::whereHas('postReaction', function ($q) use ($post) {
      $q->where('post_id', $post->id)->where('reaction', 1)->latest();
    })->get();
    $user = UserResource::collection($user);

    return response()->json(['status' => '200', 'return' => $user], 200);
  }

  public function likePost(Request $request)
  {
    $request->validate([
      'post_id' => 'required|string',
      'reaction' => 'required|integer',
    ]);

    $post = Post::where('id', $request->post_id)->first();
    if (!$post) {
      return response()->json(['status' => '404', 'message' => 'post not found!'], 404);
    }

    $postReaction = PostReaction::where('post_id', $request->post_id)->where('user_id', Auth::user()->id)->first();
    if ($postReaction) {
      $postReaction->reaction = $request->reaction;
      $postReaction->save();
    } else {
      $postReaction = new PostReaction();
      $postReaction->post_id = $request->post_id;
      $postReaction->user_id = Auth::user()->id;
      $postReaction->reaction = $request->reaction;
      $postReaction->save();
    }

    return response()->json(['status' => '200', 'message' => 'post reaction updated!'], 200);
  }

  public function deletePost(Request $request)
  {
    $request->validate([
      'post_id' => 'required|string',
    ]);

    $post = Post::where('id', $request->post_id)->first();
    if (!$post) {
      return response()->json(['status' => '404', 'message' => 'post not found!'], 404);
    }

    $post->delete();
    Storage::disk('local_storage')->delete($post->image);

    return response()->json(['status' => '200', 'message' => 'post deleted!'], 200);
  }

  public function deletePostByDays()
  {
    $posts = Post::where('created_at', '<', now()->subDays(15))->get();
    foreach ($posts as $post) {
      $post->delete();
      Storage::disk('local_storage')->delete($post->image);
    }
  }
}
