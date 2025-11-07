<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
/**
 * The index function retrieves random sets of most popular and most viewed videos with their
 * associated user and category information to display on the front page.
 * @param Request request The `` parameter in the `index` function is an instance of the
 * `Illuminate\Http\Request` class. 
 * @return The `index` function is returning a view called 'front.index' with the variables
 * `` and ``. 
 */
    public function index(Request $request)
    {

        $mostPopular = Video::with(['user', 'category'])->filter($request->all())->get()->random(6);
        $mostViewed = Video::with(['user', 'category'])->filter($request->all())->get()->random(6);
        return view('front.index', compact('mostPopular', 'mostViewed'));
    }
}
