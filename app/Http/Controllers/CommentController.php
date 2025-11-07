<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Video;

class CommentController extends Controller
{
    /**
     * The above PHP function is a constructor that sets the middleware to 'auth'.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * The `store` function creates a new comment for a video and redirects back with a success message.
     * 
     * @param StoreCommentRequest request The `` parameter in the `store` function is an instance
     * of `StoreCommentRequest`.
     * @param Video video The `` parameter in the `store` method is an instance of the `Video` model.
     * It is used to associate the comment with a specific video
     * @return  `back()->with('alert',__('messages.comment_was_sent_successfully'))` statement is being
     * returned.
     */
    public function store(StoreCommentRequest $request, Video $video)
    {
        $video->comments()->create([
            'user_id' => auth()->id(),
            'body' =>  $request->body
        ]);

        return back()->with('alert', __('messages.comment_was_sent_successfully'));
    }
}
