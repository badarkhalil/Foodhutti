@extends('layout.master')
@section('title', 'Change Password')
@section('parentPageTitle', 'Change Password')
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
                <h2><strong>Manage</strong> Restaurant</h2>
                <a href="#" class="btn btn-gradient-primary btn-fw">Back to Category</a>

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
            @if (Session::has('message'))
                <div class="alert alert-success">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif
            @if (Session::has('message_error'))
                <div class="alert alert-danger">
                    <p>{{ Session::get('message_error') }}</p>
                </div>
            @endif
            <div class="body">
                <form method="POST" action="{{ route('update_password') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <label for="email"  >Email</label>
                            <input id="email" class="block mt-1 form-control"
                                            type="email"
                                            name="email"
                                            value="{{ Auth::user()->email }}"
                                            disabled
                                         required />
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label for="password"  >Password</label>
                            <input id="password" class="block mt-1 form-control"
                                            type="password"
                                            name="oldpassword"
                                         required autocomplete="current-password" />
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label for="password"  >New Password</label>

                            <input id="password" class="block mt-1 form-control"
                                            type="password"
                                            name="newpassword"
                                         required autocomplete="current-password" />
                        </div>
                    </div>
                    <!-- Password -->


                    <div class="flex justify-end mt-4">
                        <input type="submit" class="btn btn-info" value="Confirm">
                    </div>
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


