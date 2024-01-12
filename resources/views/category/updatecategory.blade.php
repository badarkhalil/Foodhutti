@extends('layout.master')
@section('title', 'Update Categories')
@section('parentPageTitle', 'Categories')
@section('content')
   <!-- Vertical Layout -->
   <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="alert alert-warning" role="alert">
            <strong>Bootstrap</strong> Better check yourself, <a target="_blank" href="https://getbootstrap.com/docs/4.2/components/forms/">View More</a>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
            </button>
        </div>
        <div class="card">
            <div class="header">
                <h2><strong>Update</strong> Category</h2>
                <a href="{{ route ('category.index') }}" class="btn btn-gradient-primary btn-fw">Back to Category</a>

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
                <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <input type="hidden" name="id" value="{{$data['id']}}">
                </div>
                    <div class="form-group">
                        <input type="text" id="category_name" name="category_name"  class="form-control" value="{{$data['category_name']}}">
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file border" name="image" id="file" value="{{$data['file']}}">
                      </div>

                    <button type="submit" name="submit" class="btn btn-raised btn-primary btn-round waves-effect">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>







@stop
