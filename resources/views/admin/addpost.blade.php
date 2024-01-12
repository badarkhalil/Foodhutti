@extends('layout.master')
@section('title', 'New Post')
@section('parentPageTitle', 'Posts')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')


    <div class="body_scroll">

        <div class="container-fluid">

            <div class="row">
                <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="col-lg-12">
                    <div class="card">

                        <div class="body">
                            <div class="form-group">
                                <input type="text" name="post_title" class="form-control" placeholder="Enter Blog title" />
                            </div>
                            <div class="form-group">
                                <select name="subcategory_id" class="form-control show-tick">
                                    <option value=""> Select Categories</option>
                                    @foreach($data as $list)
                                    <option value="{{$list->id}}"> {{$list->subcategory_name}}</option>

                               @endforeach
                              </select>
                            </div>
                        </div>

                    </div>
                    <div class="card">
                        <div class="body">
                            <textarea name="post_text" rows="10" class="form-control" id="exampleFormControlTextarea1" cols="100" >

                            </textarea><br>
                            <div class="form-group">
                                <input  type="file" id="file" name="file" class="form-control" placeholder="Enter Blog title" />
                            </div>
                            <input type="submit" class="btn btn-info waves-effect m-t-20" value="Add Post">
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
@stop
@section('page-script')
<script src="{{asset('assets/plugins/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
@stop
