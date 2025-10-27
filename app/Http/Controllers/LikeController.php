<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Video $video)
    {
        $vote = (int)($request->input('vote'));
        
        // whiteList
        if (!in_array($vote, [1, -1])) {
            return back()->with('error', 'Invalid vote');
        }
  
        // if User Has  any and has same vote
        $like = $video->likes()
            ->where('user_id', auth()->id())
            ->where('vote', $vote)
            ->first();
            
        //create if not fount 
        if (!$like) {
            $video->likes()->create([
                'user_id' => auth()->id(),
                'vote' => $vote
            ]);

            return back();
        }

        // delete if found and equal
        if ($like->vote === $vote) {
            $like->delete();
            return back();
        }

        return back();
    }
}
