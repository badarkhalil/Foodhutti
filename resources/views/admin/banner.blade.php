@extends('layout.master')
@section('title', 'Ads')
{{-- @section('parentPageTitle', 'Categories') --}}
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/summernote/dist/summernote.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap-select/css/bootstrap-select.css')}}"/>
@stop
@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2><strong>Ads</strong> List</h2>
                <a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">Add Ad</a>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
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
                <div class="table-responsive">
                    <table class="table m-b-0">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID#</th>
                                <th scope="col">Ads Image</th>
                                <th>Ad Type</th>
                                <th>Published Status</th>
                                <th>Total Days</th>
                                <th>Added Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ads as $list)
                                <tr>
                                    <td scope="row">{{ $list->id }}</dt>
                                    <td>
                                        <a href="{{ asset('assets/restaurant') }}/{{ $list->file_name }}" target="_blank">
                                            <img src="{{ asset('assets/restaurant') }}/{{ $list->file_name }}" width="50" height="50" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        @if ($list->adtype == 1)
                                            <span class="badge badge-success">Banner Ad</span>
                                        @endif
                                        @if ($list->adtype == 2)
                                            <span class="badge badge-success">Side Ad Top</span>
                                        @endif
                                        @if ($list->adtype == 3)
                                            <span class="badge badge-success">Side Ad Bottom</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($list->publish == 0)
                                            <span class="badge badge-danger">Not Publisde</span>
                                        @endif

                                        @if ($list->publish == 1)
                                            <span class="badge badge-success">Publisde</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">{{ $list->daysfor }}</span>
                                    </td>
                                    <td>
                                        {{ $list->created_at }}
                                    </td>
                                    <td style="width:20%">
                                        <a href="{{ route('ads_delete', $list->id ) }}"class="btn btn-gradient-danger btn-rounded btn-sm"> <i class="zmdi zmdi-delete"></i> </a>
                                        @if ($list->publish == 0)
                                            <a href="{{ route('publisad',$list->id) }}" class="btn btn-sm btn-success">Publish</a>
                                         @else
                                            <a href="{{ route('unpublisad',$list->id) }}" class="btn btn-sm btn-danger">Unpublish</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>


</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-full" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Ad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="result">
                <form action="{{ route('bannerads') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 mt-1">
                            <label for="">Upload Ad Image</label>
                            <input type="file" name="file_name" class="form-control" required>
                        </div>
                        <div class="col-sm-12 col-lg-12 mt-1">
                            <label for="">Select Ad Type</label>
                            <select class="form-control-file border" name="adtype" id="adtype" required>
                                <option selected disabled>Select</option>
                                <option value="1">Banner Ad</option>
                                <option value="2">Side Ad Top</option>
                                <option value="3">Side Ad Bottom</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-lg-12 mt-1">
                            <label for="">Number of Days <small>(for how long ad is to be placed)</small></label>
                            <input type="number" name="daysfor" class="form-control" required>
                        </div>
                        <div class="col-sm-12 col-lg-12 mt-1">
                            <label for="">Enter Url <small>(if ad is clickable, its optional)</small></label>
                            <input type="text" name="url" class="form-control">
                        </div>
                        <div class="col-sm-12 col-lg-12">
                            <input value="Upload" type="submit" name="submit" class="w-100 btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@stop
