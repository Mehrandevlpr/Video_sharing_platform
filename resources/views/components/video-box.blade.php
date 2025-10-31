                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                            <div class="hover-efect"></div>
                            <small class="time">{{$video->length_in_human}}</small>
                            <a href="{{route('front.videos.show',$video->slug)}}"><img src="{{$video->video_thumbnail}}" alt=""></a>
                        </div>
                        <div class="video-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="{{route('front.videos.show',$video->slug)}}" class="title">{{$video->name}}</a>

                                </div>
                                @can('update',$video)
                                <div class="col-md-6">
                                    <a href="{{route('front.videos.edit',$video->slug)}}" class="icon-pencil">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>
                                @endcan
                            </div>
                            <a href="#" class="channel-name">
                                <span>
                                    <i class="fa fa-check-circle">{{$video->owner_name}}</i>
                                </span>
                            </a>

                            <span class="views"><i class="fa fa-eye"></i>2.8M بازدید </span>
                            <span class="date"><i class="fa fa-clock-o"></i>{{$video->created_at}} </span>
                            <span class="date"><i class="fa fa-tag"></i>{{$video->category_name}} </span>
                        </div>
                    </div>
                </div>