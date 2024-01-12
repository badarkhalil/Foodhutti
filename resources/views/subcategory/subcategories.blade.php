@extends('layout.master')
@section('title', 'Sub Categories')
{{-- @section('parentPageTitle', 'Categories') --}}
@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2><strong>Category</strong> List<small>Add Class <code>.thead-dark</code></small></h2>
                <ul class="header-dropdown">
                    <a href="{{ route ('subcategory.create') }}" class="btn btn-gradient-primary btn-fw">Add Category</a>
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
                            <th scope="col">Sub Category Name </th>
                            <th scope="col">P Category Name </th>


                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catagorylist as $list)


                            <tr>
                            <th scope="row">{{ $list->id }}</th>
                            <td>{{ $list->subcategory_name }}</td>
                            <td>{{ $list->category_id }}</td>


                            <td style="width:20%">
                                <a href="{{ route('subcategory.edit', $list->id ) }}" class="btn btn-gradient-danger btn-rounded btn-sm"> <i class="zmdi zmdi-edit"></i> </a>
                                 <a href="{{ route('subcategory.destroy', $list->id ) }}"class="btn btn-gradient-danger btn-rounded btn-sm"> <i class="zmdi zmdi-delete"></i> </a> </td>
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
