@extends('layout.master')
@section('title', 'Manage Categories')
@section('parentPageTitle', 'Categories')
@section('content')
   <!-- Vertical Layout -->
   <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="card">
            <div class="header">
                <h2><strong>Manage</strong> Category</h2>


                <ul class="header-dropdown">
                    <a href="{{ route ('category.index') }}" class="btn btn-gradient-primary btn-fw">Back to Category</a>


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
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" >
                    @csrf

                    <div class="form-group">
                        <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Enter Category Name  ">

                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file border" name="image" id="file">
                      </div>


                    {{--  <div class="checkbox">
                        <input id="remember_me" type="checkbox">
                        <label for="remember_me">
                                Remember Me
                        </label>
                    </div>  --}}
                    <button type="submit" name="submit" class="btn btn-raised btn-primary btn-round waves-effect">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>







@stop
