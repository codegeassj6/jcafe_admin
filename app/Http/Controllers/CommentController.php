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
        $comments = Comment::where('post_id', $id)->orderByDesc('created_at')->paginate(3);
        foreach($comments as $comment) {
            $comment->getLikes;
            if ($comment->getLikes) {
                $comment->authLikes = $comment->getLikes->where('user_id', Auth::id())->first() ? 1 : 0;
            } else {
                $comment->authLikes = 0;
            }
        }

        return $comments;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'exists:posts,id',
            'message' => 'string|required|max:200',
        ]);

        if($validator->fails()) {
            return response()->json(['message' => $validator->messages()->get('*')], 500);
        }

        $comment = Comment::create([
            'post_id' => $id,
            'user_id' => Auth::id(),
            'message' => $request->input('message'),
        ]);

        if ($comment->getLikes) {
            $comment->authLikes = $comment->getLikes->where('user_id', Auth::id())->first() ? 1 : 0;
        } else {
            $comment->authLikes = 0;
        }

        return $comment;
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
    public function update(Request $request, $id)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $post_id)
    {
        $comment = Comment::whereId($request->input('comment_id'))->where('user_id', Auth::id())->firstOrFail();
        foreach($comment->getLikes as $like) {
            $like->delete();
        }
        $comment->delete();
        return response()->json(['message' => 'deleted'], 200);
    }
}
