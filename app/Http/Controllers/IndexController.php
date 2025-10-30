<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $mostPopular = Video::with(['user', 'category'])->filter($request->all())->get()->random(6);
        $mostViewed = Video::with(['user', 'category'])->filter($request->all())->get()->random(6);
        return view('front.index', compact('mostPopular', 'mostViewed'));
    }
}
