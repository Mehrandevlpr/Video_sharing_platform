<?php

namespace App\Http\Controllers;


class LikeController extends Controller
{
    public function store(string $likeable_type,  $likeable_id)
    {
        $likeable_id->likedBy(auth()->user());
        return back();
    }
}
