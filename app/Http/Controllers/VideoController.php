<?php

namespace App\Http\Controllers;

use App\Events\VideoCreated;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Category;
use App\Models\Video;
use App\Services\FFmpeg\FFmpegAdapter;
use App\Services\VideoService\VideoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

// Standard controller Interface (index, show, edit, delete)

class VideoController extends Controller
{

   /**
    * Class constructor.
    */
   public function __construct()
   {
      // if(!Gate::allows('edit-video', $video)) return abort(403); multiple ways of check gate policies
      // $this->authorize('update', $video);
      $this->authorizeResource(Video::class, 'video');
   }

   public function index()
   {
      $videos = Video::all();
      return $videos;
   }

   public function create()
   {
      $categories = Category::all();
      return view('front.videos.create', compact('categories'));
   }

   public function store(StoreVideoRequest $request)
   {
      (new VideoService)->create($request->user(), $request->all());
      VideoCreated::dispatch(Auth::user());
      return redirect()->route('front.index')->with('success', __('messages.success'));
   }


   public function show(Request $request, Video $video)
   {
      $video->load('comments.user');
      return view('front.videos.show', compact('video'));
   }

   public function edit(Request $request, Video $video)
   {
      $categories = Category::all();
      return view('front.videos.edit', compact('video', 'categories', 'request'));
   }


   public function update(UpdateVideoRequest $request, Video $video)
   {
      if ($request->hasFile('file')) {
         (new VideoService)->update($video, $request->all());
      }
      return redirect()->route('front.videos.show', $video->slug)->with('alert', __('messages.video_edited'));
   }
}
