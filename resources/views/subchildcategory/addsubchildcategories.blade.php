@extends('layout.master')
@section('title', 'Manage Restaurants')
@section('parentPageTitle', 'Restaurants')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')
   <!-- Vertical Layout -->
   <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="card">
            <div class="header">
                <h2><strong>Manage</strong> Restaurants</h2>
                <a href="{{ route ('subchildcategory.index') }}" class="btn btn-gradient-primary btn-fw">Back to Category</a>

                <ul class="header-dropdown">


                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <form action="{{ route('subchildcategory.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input type="text" id="subchildcategory_name" name="subchildcategory_name" class="form-control" placeholder="Enter Category Name  ">
                    </div>

                    <div class="form-group">
                        <select name="subcategory_id" class="form-control show-tick">
                            <option value=""> Select Categories</option>
                            @foreach($subchild as $list)
                            <option value="{{$list->id}}"> {{$list->subcategory_name}}</option>

                       @endforeach
                      </select>
                    </div>


                    <div class="checkbox">
                        <input id="remember_me" type="checkbox">
                        <label for="remember_me">
                                Remember Me
                        </label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-raised btn-primary btn-round waves-effect">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('page-script')
<script src="{{asset('assets/plugins/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
@stop
