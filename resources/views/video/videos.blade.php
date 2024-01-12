@extends('layout.master')
@section('title', 'video')
{{-- @section('parentPageTitle', 'video') --}}
@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2><strong>video</strong> List</h2>
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
                            <th scope="col">#</th>
                            <th scope="col">video title </th>
                            <th scope="col">video link </th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $data as $list)

                            <tr>
                            <th scope="row">{{ $list->id }}</th>
                            <td>{{ $list->title }}</td>
                            <td>{{ $list->link}} &nbsp;&nbsp;&nbsp;<a target="_blank" href="{{ $list->link }}">Play</a></td>


                            <td style="width:20%">
                                <a href="{{ route('video.edit',$list->id ) }}" class="btn btn-gradient-danger btn-rounded btn-sm"> <i class="zmdi zmdi-edit"></i> </a>
                                 <a href="{{ route('video.destroy',$list->id ) }}"class="btn btn-gradient-danger btn-rounded btn-sm"> <i class="zmdi zmdi-delete"></i> </a> </td>
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




@stop
