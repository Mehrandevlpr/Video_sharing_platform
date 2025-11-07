@extends('front.layout.layout')
@section('title','Home')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="card">
            <div class="card-header">
                {{__('notification.send_email')}}
            </div>
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success mt-5 rtl">
                    {{ session('success') }}
                </div>
                @endif
                <x-validation-errors />
                <form class="row g-3 mt-5">
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">{{__('notification.users')}}</label>
                        <input type="text" class="form-control" name="user" placeholder="1234 Main St">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">{{__('notification.department')}}</label>
                        <input type="text" class="form-control" name="depatement" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="col-md-6 my-10 block">
                        <label for="inputState" class="form-label mx-2">{{__('notification.email_type')}}</label>
                        <select id="inputState" name="emailType" class="form-select p-10">
                            @foreach($emailTypes as $key => $type)
                            <option value="{{$key}}" selected>{{$type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">{{__('notification.send')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection