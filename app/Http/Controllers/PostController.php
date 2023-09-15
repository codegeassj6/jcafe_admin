<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Illuminate\Validation\Rule;
use Storage;
use App\Models\PostAttachment;
use Str;
use DB;

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
            $post->getPostAttachmentImages;
            $post->getPostAttachmentFiles;

            if ($post->getPostAttachmentImages) {
                foreach ($post->getPostAttachmentImages as $image) {
                    $image->image_url = Storage::disk('s3')->temporaryUrl('posts/' . $image->file_link, now()->addMinutes(1));
                    // $image->image_url = Storage::disk('s3')->url('posts/' . $image->file_link);
                }
            }

            if ($post->getPostAttachmentImages) {
                foreach ($post->getPostAttachmentFiles as $file) {
                    $file->file_url = Storage::disk('s3')->temporaryUrl('posts/' . $file->file_link, now()->addMinutes(1));
                    // $file->file_url = Storage::disk('s3')->url('posts/' . $file->file_link);
                }
            }

            $post->getComments->sortByDesc('created_at');
        }

        return $posts;

        // $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();

        // foreach($posts as $post) {
        //     $post->getUserDetails = DB::table('users')->where('id', $post->user_id)->first();
        //     $post->getPostAttachmentImages = DB::table('post_attachments')->where('post_id', $post->id)->where('file_link', 'LIKE', '%'.'jpg'.'%')->orWhere('file_link', 'LIKE', '%'.'png'.'%')->get();

        //     $post->getPostAttachmentFiles = DB::table('post_attachments')->where('post_id', $post->id)->whereNot('file_link', 'LIKE', '%'.'jpg'.'%')->where('file_link', 'NOT LIKE', '%'.'png'.'%')->get();

        //     if($post->getPostAttachmentFiles) {
        //         foreach ($post->getPostAttachmentFiles as $file) {
        //             $file->file_url = Storage::disk('s3')->temporaryUrl('posts/' . $file->file_link, now()->addMinutes(1));
        //             $file->file_url = Storage::disk('s3')->url('posts/' . $file->file_link);
        //         }
        //     }

        //     $post->getComments = DB::table('comments')->where('post_id', $post->id)->get();
        // }

        // return $posts;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => ['sometimes', 'string', 'nullable', Rule::requiredIf(!$request->file('files'))],
            'files.*' => 'file',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->messages()->get('*')], 500);
        }

        $post = Post::create([
            'message' => $request->input('message'),
            'user_id' => Auth::id(),
        ]);



        if ($request->file('files')) {
            foreach ($request->file('files') as $file) {
                Storage::disk('s3')->putFileAs('/posts', $file, $file->hashName());
                PostAttachment::create([
                    'post_id' => $post->id,
                    'file_link' => $file->hashName(),
                    'name' => $file->getClientOriginalName(),
                ]);
            }
        }

        $post->getUserDetails;
        $post->getComments()->orderBy('created_at', 'desc');
        return $this->index();
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
