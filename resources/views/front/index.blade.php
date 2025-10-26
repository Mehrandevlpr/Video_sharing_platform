@extends('front.layout.layout')


@section('content')
            @if (session('success'))
                <div class="alert alert-success mt-5 rtl">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('alert'))
                <div class="alert alert-success mt-5 rtl" >
                    {{ session('alert') }}
            </div>
            @endif

            <x-latest-videos></x-latest-videos> 
            
            <h1 class="new-video-title"><i class="fa fa-bolt"></i> پربازدیدترین ویدیوها</h1>
            <div class="row">
                <!-- video-item -->
                @foreach($mostPopular as $video) 
                   <x-video-box :video="$video" />
                @endforeach
            </div>

            <h1 class="new-video-title"><i class="fa fa-bolt"></i> محبوب‌ترین‌ها</h1>
            <div class="row">
                <!-- video-item -->
                @foreach($mostViewed as $video) 
                   <x-video-box :video="$video" />
                @endforeach
            </div>

@endsection