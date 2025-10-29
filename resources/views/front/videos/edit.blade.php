@extends('front.layout.layout')


@section('content')
<div id="upload">
    <div class="row">
        <x-validation-errors />
        <div class="col-md-8">
            <h1 class="page-title"><span>آپلود</span> فیلم</h1>
            <form action="{{route('front.videos.update',$video->slug)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>@lang('video-create.name')</label>
                        <input name="name" value="{{$video->name}}" type="text" class="form-control" placeholder="عنوان">
                    </div>
                    <div class="col-md-6">
                        <label> نام یکتا</label>
                        <input name="slug" value="{{$video->slug}}" type="text" class="form-control" placeholder="برچسب ها">
                    </div>
                    <div class="col-md-6">
                        <label>آپلود فیلم</label>
                        <input id="" type="file" name="file" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>دسته بندی</label>
                        <select class="form-control" name="category_id" id="category">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                {{$category->id === $video->category_id ? 'selected' : ''}}>
                                {{$category->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label>توضیحات</label>
                        <textarea name="description" value="{{$video->description_value}}" class="form-control" rows="4" placeholder="توضیحات"></textarea>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" id="contact_submit" class="btn btn-dm">ذخیره</button>
                    </div>
                </div>
            </form>
        </div><!-- // col-md-8 -->

        <div class="col-md-4">
            <a href="#"><img src="{{asset('img/upload-adv.png')}}" alt=""></a>
        </div><!-- // col-md-8 -->
        <!-- // upload -->
    </div><!-- // row -->
</div><!-- // upload -->
@endsection