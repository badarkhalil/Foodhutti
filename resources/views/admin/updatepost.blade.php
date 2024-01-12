@extends('layout.master')
@section('title', 'Update Post')
@section('parentPageTitle', 'Posts')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')


    <div class="body_scroll">

        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('post.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{$post->id}}">
                            </div>
                            <div class="form-group">
                                <input type="text"  name="post_title" class="form-control"  value="{{$post->title}}">
                            </div>
                            <select name="subcategory_id" class="form-control show-tick">
                                @foreach($data as $list)
                                  @if ($post->id == $list->id)
                                   <option selected value="{{$list->id}}">

                                    @else
                                    <option  value="{{$list->id}}">
                                        @endif {{$list->subcategory_name}}</option>
                               @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">

                            <textarea name="post_text" rows="10" class="form-control" id="exampleFormControlTextarea1" cols="100" >
                                {{$post->post_text}}
                            </textarea><br>

                            <div class="form-group">

                                <input  type="file" id="file" name="file" class="form-control"  />
                            </div>

                            <div class="form-group">
                                <p>cover</p>
                                <form action="/deleteimage/{{ $post->id }}" method="post" >
                                    <button class="btn text-danger">x</button>
                                    @csrf
                                    @method('delete')
                                </form>
                             <img src="{{ asset('assets/images/blog') }}/{{ $post->file }}" width="60px" height="60px" />
                            </div>

                            <button type="submit"  name="submit" class="btn btn-info waves-effect m-t-20">POST</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    {{-- <script>
        $(document).ready(function(){
            $(".summernote").summernote("code","asdasdas");
        });

    </script> --}}
@stop
@section('page-script')
<script src="{{asset('assets/plugins/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
@stop
