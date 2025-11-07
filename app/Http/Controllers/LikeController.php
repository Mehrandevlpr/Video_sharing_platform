<?php

namespace App\Http\Controllers;


class LikeController extends Controller
{
/**
 * The store function checks if a user is authenticated, then likes a specific item and redirects back.
 * 
 * @param string likeable_type The `likeable_type` parameter in the `store` function is a string that
 * represents the type of the entity being liked.
 * @param likeable_id The `likeable_id` parameter in the `store` function seems to represent the
 * identifier of the item that is being liked. 
 * @return The `store` function is returning a redirect response to the login page if the user is not
 * authenticated.
 */
    public function store(string $likeable_type,  $likeable_id)
    {
        if(!auth()->user()){
            return redirect()->route('login.create');
        }
        
        $likeable_id->likedBy(auth()->user());
        return back();
    }
}
