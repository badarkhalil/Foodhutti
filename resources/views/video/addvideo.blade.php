@extends('layout.master')
@section('title', 'Manage video')
@section('parentPageTitle', 'video')
@section('content')
   <!-- Vertical Layout -->
   <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">

        <div class="card">
            <div class="header">
                <h2><strong>Manage</strong> video<small>Add Class <code>.thead-dark</code></small></h2>


                <ul class="header-dropdown">
                    <a href="" class="btn btn-gradient-primary btn-fw">Back to video</a>


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
                <form action="{{ route('video.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter video title  ">
                    </div>
                    <div class="form-group">
                        <input type="text" id="link" name="link" class="form-control" placeholder="Embade video link  ">
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
