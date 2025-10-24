<div id="related-posts">
@foreach ($videos as $video)

    <!-- video item -->
    <div class="related-video-item">
        <div class="thumb">
            <small class="time">{{$video->lengthInHuman}}</small>
            <a href="{{route('front.videos.show',$video->slug)}}"><img src="{{$video->thumbnail}}" alt=""></a>
        </div>
        <a href="{{route('front.videos.show',$video->slug)}}" class="title">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ </a>
        <a class="channel-name" href="#">{{$video->name}}<span>
                <i class="fa fa-check-circle"></i></span></a>
    </div>

@endforeach      
                        
</div>