@extends('layout.master')
@section('title', 'Posts')
{{-- @section('parentPageTitle', 'Categories') --}}
@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2><strong>Posts</strong> List</h2>
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
                {{session('message')}}
                <div class="table-responsive">
                    <table class="table m-b-0">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Post Title </th>
                            <th scope="col">Category </th>

                            <th scope="col">image </th>


                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($result as $list )
 <tr>
                            <th scope="row">{{ $list->id }}</th>
                            <td>{{ $list->title }}</td>
                            <td>{{ $list->subcategory_id }}</td>

                            <td> <img src="{{ asset('assets/images/blog') }}/{{ $list->file }}" width="60px" height="60px" /> </td>


                            <td style="width:20%">
                                <a href="{{ route('post.edit',$list->id ) }}" class="btn btn-gradient-danger btn-rounded btn-sm"> <i class="zmdi zmdi-edit"></i> </a>
                                 <a href="{{ route('post.destroy',$list->id ) }}"class="btn btn-gradient-danger btn-rounded btn-sm"> <i class="zmdi zmdi-delete"></i> </a> </td>
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
