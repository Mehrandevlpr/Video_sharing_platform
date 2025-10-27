<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request,string $likeable_type, string $likeable_id)
    {

        $model_name = "\\App\\Models\\" . ucfirst($likeable_type);
        $routeKey = (new $model_name)->getRouteKeyName();
        $vote = (int)($request->input('vote'));
        
        // whiteList
        if (!in_array($vote, [1, -1])) {
            return back()->with('error', 'Invalid vote');
        }
  
        // if User Has  any and has same vote
        $likeable = $model_name::where($routeKey, $likeable_id)->firstOrFail();

        $existingLike = $likeable->likes()
        ->where('user_id', auth()->id())
        ->where('vote', $vote)
        ->first();

            
        //create if not fount 
        if (!$existingLike) {
            $likeable->likes()->create([
                'likeable_type' => $model_name,
                'user_id' => auth()->id(),
                'vote' => $vote
            ]);

            return back();
        }

        // delete if found and equal
        if ($existingLike->vote === $vote) {
            $existingLike->delete();
            return back();
        }

        return back();
    }
}
