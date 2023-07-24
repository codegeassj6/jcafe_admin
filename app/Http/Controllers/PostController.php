<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Validation\Rule;
use Storage;
use App\Models\PostAttachment;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $posts = Post::orderBy('created_at', 'desc')->get();
    foreach ($posts as $post) {
      $post->getUserDetails;
      $post->getComments()->orderBy('created_at', 'desc');
    }

    return $posts;
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
        'message' => ['sometimes', 'string', 'nullable' ,Rule::requiredIf(!$request->file('files'))],
        'files.*' => 'file',
    ]);

    if($validator->fails()) {
        return response()->json(['message' => $validator->messages()->get('*')], 500);
    }

    $post = Post::create([
      'message' => $request->input('message'),
      'user_id' => Auth::id(),
    ]);

    foreach($request->file('files') as $file) {
      Storage::disk('s3')->putFileAs('/posts', $file, $file->hashName());
      PostAttachment::create([
        'post_id' => $post->id,
        'file_link' => $file->hashName(),
      ]);
    }

    $post->getUserDetails;
    $post->getComments()->orderBy('created_at', 'desc');
    return $post;
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Post $post)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post)
  {
    //
  }
}
