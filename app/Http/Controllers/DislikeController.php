<?php

namespace App\Http\Controllers;


class DislikeController extends Controller
{
/**
 * The store function dislikes a specific likeable item for the authenticated user.
 * 
 * @param string likeable_type The `likeable_type` parameter in the `store` function is a string that
 * represents the type of the entity being liked.
 * @param likeable_id The `likeable_id` parameter in the `store` function is expected to be the ID of
 * the item that the user wants to dislike.
 * 
 * @return The `back()` function is being returned, which typically redirects the user back to the
 * previous page.
 */
    public function store(string $likeable_type,  $likeable_id)
    {

        $likeable_id->disLikedBy(auth()->user());
        return back();
    }
}
