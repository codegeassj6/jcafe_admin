<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Validator;
use Auth;
use App\Models\Post;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $comments = Comment::where('post_id', $id)->get();

        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
       $post = Post::whereId($id)->firstOrFail();

        $validator = Validator::make($request->all(), [
            'message' => 'string|required|max:200',
        ]);

        if($validator->fails()) {
            return response()->json(['message' => $validator->messages()->get('*')], 500);
        }

        Comment::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
            'message' => $request->input('message'),
        ]);

        return $this->index($id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
