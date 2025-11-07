<?php

namespace App\Http\Controllers;

use App\Events\VideoCreated;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\Category;
use App\Models\Video;
use App\Services\VideoService\VideoService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


// Standard controller Interface (index, show, edit, delete)

class VideoController extends Controller
{


  /**
   * The constructor function authorizes resource access for the Video model in PHP.
   */
   public function __construct()
   {
      // if(!Gate::allows('edit-video', $video)) return abort(403); multiple ways of check gate policies
      // $this->authorize('update', $video);
      $this->authorizeResource(Video::class, 'video');
   }


/**
 * The create function retrieves all categories and passes them to the create view for video creation.
 * 
 * @return The `create()` function is returning a view called 'front.videos.create' and passing the
 * variable `` to the view using the `compact()` function.
 */

   public function create()
   {
      $categories = Category::all();
      return view('front.videos.create', compact('categories'));
   }

/**
 * @param StoreVideoRequest request The `store` function is a method that handles the storing of a
 * video based on the data provided in the `StoreVideoRequest` object.
 * @return  redirect response is being returned with a success message flashed to the session
 */
   public function store(StoreVideoRequest $request)
   {
      (new VideoService)->create($request->user(), $request->all());
      VideoCreated::dispatch(Auth::user());
      return redirect()->route('front.index')->with('success', __('messages.success'));
   }



/**
 * The function loads comments and associated users for a video and then returns a view for displaying
 * the video.
 * @param Request request The `` parameter in the `show` function is an instance of the
 * `Illuminate\Http\Request` class. 
 * @param Video video The `` parameter in the `show` function represents a specific video that is
 * being requested to be shown. 
 * @return `show` function is returning a view named 'front.videos.show' with the video data loaded
 * with comments and users.
 */
   public function show(Request $request, Video $video)
   {
      $video->load('comments.user');
      return view('front.videos.show', compact('video'));
   }

/**
 * The edit function retrieves all categories and returns a view for editing a video with the
 * associated categories and request data.
 * 
 * @param Request request The `` parameter in the `edit` function is an instance of the
 * `Illuminate\Http\Request` class.
 * @param Video video The `` parameter in the `edit` function represents the specific video that
 * is being edited. 
 * @return `edit` function is returning a view named 'front.videos.edit' along with the variables
 * ``, ``, and `` passed to the view using the `compact` function.
 */
   public function edit(Request $request, Video $video)
   {
      $categories = Category::all();
      return view('front.videos.edit', compact('video', 'categories', 'request'));
   }


/**
 * The update function checks if a file is present in the request, updates the video using a
 * VideoService if so, and then redirects to the video's show page with a success message.
 * 
 * @param UpdateVideoRequest request The `` parameter in the `update` function is an instance
 * of `UpdateVideoRequest`, which is a class representing the request for updating a video. 
 * @param Video video The `update` function you provided seems to be a method within a controller that
 * updates a video based on the data from an `UpdateVideoRequest` and the `Video` model instance.
 * 
 * @return 'update' returning a redirect response to the route 'front.videos.show' with the video's
 * slug as a parameter. 
 */
   public function update(UpdateVideoRequest $request, Video $video)
   {
      if ($request->hasFile('file')) {
         (new VideoService)->update($video, $request->all());
      }
      return redirect()->route('front.videos.show', $video->slug)->with('alert', __('messages.video_edited'));
   }
}
