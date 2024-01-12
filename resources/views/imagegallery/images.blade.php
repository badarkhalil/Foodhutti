@extends('layout.master')
@section('title', 'File Upload')
@section('parentPageTitle', 'Form')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/dropify/css/dropify.min.css')}}"/>
@stop
@section('content')
<div class="row clearfix">
    @if($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
    <div class="col-lg-12 col-md-12">

            {{-- <form method="POST" action="{{ route('image.store') }}"  enctype="multipart/form-data" >
                @csrf
                <div class="card">
            <div class="body">
                <input type="text" id="title" name="title" class="form-control" placeholder="Enter event Name  ">
            </div>
            <div class="body">
                <input type="file" name="file[]" class="form-control"  multiple>
            </div>
            <div class="body">
            <button type="submit" name="submit" class="btn btn-raised btn-primary btn-round waves-effect">Submit</button>
            </div> </div>
            </form> --}}

        <div class="card">
            <div class="header">
                <h2>With <strong>event</strong> and default file</h2>
            </div>
            <div class="body">
                <p>try to remove the image</p>
                <input type="file" id="dropify-event" data-default-file="{{asset('assets/images/image-gallery/1.jpg')}}">
            </div>
        </div>

    </div>




</div>
@stop
@section('page-script')
<script src="{{asset('assets/plugins/dropify/js/dropify.min.js')}}"></script>
<script src="{{asset('assets/js/pages/forms/dropify.js')}}"></script>

@stop
