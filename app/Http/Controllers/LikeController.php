<?php

namespace App\Http\Controllers;


class LikeController extends Controller
{
    public function store(string $likeable_type,  $likeable_id)
    {
        if(!auth()->user()){
            return redirect()->route('login.create');
        }

        $likeable_id->likedBy(auth()->user());
        return back();
    }
}
