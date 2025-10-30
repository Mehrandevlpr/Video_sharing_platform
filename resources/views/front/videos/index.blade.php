@extends('front.layout.layout')


@section('content')

<form action="#" class="mt-5" method="get">
    <div class="row">
        <div class="form-group col-md-3">
            <label for="inputSort">ترتیب بر اساس</label>
            <select name="sortBy" class="form-control" id="inputSort">
                <option {{ request()->query('sortBy') === 'created_at' ? 'selected' : '' }} value="created_at">جدیدترین</option>
                <option {{ request()->query('sortBy') === 'like' ? 'selected' : '' }} value="like">محبوب ترین</option>
                <option {{ request()->query('sortBy') === 'length' ? 'selected' : '' }} value="length">مدت زمان</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="inputLength">مدت زمان ویدیو</label>
            <select name="length"  class="form-control" id="inputLength">
                <option {{ request()->query('length') == null ? 'selected' : '' }} value="">همه</option>
                <option {{ request()->query('length') == 1 ? 'selected' : '' }} value="1">کمتر از یک دقیقه</option>
                <option {{ request()->query('length') == 2 ? 'selected' : '' }} value="2">1تا 5 دقیقه </option>
                <option {{ request()->query('length') == 3 ? 'selected' : '' }} value="3">بیشتر از 5 دقیقه</option>
            </select>
        </div>
        <div class="form-group col-md-3 mt-5">
            <button type="submit" class="btn btn-primary">فیلتر</button>
        </div>
    </div>
</form>
<h1 class="new-video-title"><i class="fa fa-bolt"></i>{{$title}} </h1>
<div class="row">
    <!-- video-item -->
    @foreach($videos as $video)
    <x-video-box :video="$video" />
    @endforeach
</div>

<div class="text-center" dir="ltr">
    {{$videos->links()}}
</div>
@endsection