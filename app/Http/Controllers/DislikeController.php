<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DislikeController extends Controller
{
    public function store(Request $request,string $likeable_type,  $likeable_id)
    {


        // if User Has  any and has same vote

        $existingLike = $likeable_id->likes()
        ->where('user_id', auth()->id())
        ->where('vote', -1)
        ->first();

            
        //create if not fount 
        if (!$existingLike) {
            $likeable_id->likes()->create([
                'likeable_type' => $likeable_type,
                'user_id' => auth()->id(),
                'vote' => -1
            ]);

            return back();
        }

        // delete if found and equal
        if ($existingLike->vote === -1) {
            $existingLike->delete();
            return back();
        }

        return back();
    }
}

