<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        
        $mostPopular = Video::all()->random(6);
        $mostViewed = Video::all()->random(6);
        return view('front.index',compact('mostPopular', 'mostViewed'));
    }
}
