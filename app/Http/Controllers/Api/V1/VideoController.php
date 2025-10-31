<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Resources\VideoResource;
use App\Models\User;
use App\Models\Video;
use App\Services\VideoService\VideoService;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function show(Video $video)
    {
        return (new VideoResource($video));
    }


    public function index(Request $request)
    {
        $videos = Video::filter($request->all())->paginate();
        return VideoResource::collection($videos);
    }

    public function store(StoreVideoRequest $request)
    {
        (new VideoService)->create(User::find(4), $request->all());

        return response()->json([
            'messages' => "video Created successfully"
        ], 201);
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        (new VideoService)->update($video, $request->all());

        return response()->json([
            'messages' => "video updated successfully"
        ], 200);
    }
}
