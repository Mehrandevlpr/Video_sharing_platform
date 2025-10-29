<?php

namespace App\Http\Controllers;


class DislikeController extends Controller
{
    public function store(string $likeable_type,  $likeable_id)
    {

        $likeable_id->disLikedBy(auth()->user());
        return back();
    }
}
