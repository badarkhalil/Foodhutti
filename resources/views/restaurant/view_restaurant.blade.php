@extends('layout.master')
@section('title', 'Restaurants')
{{-- @section('parentPageTitle', 'Categories') --}}
@section('content')
<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h2><strong>Restaurant</strong> List</h2>
                @if (count($restaurantlist) > 0)
                <a href="{{ route('restaurant_details',$restaurantlist[0]->slug) }}" class="btn btn-info">View Public Page</a>
                @endif
                @if (Auth::check())
                    @php
                        $owner = App\Models\restaurant::where('user_id',Auth::user()->id)->first();
                    @endphp
                    @if ($owner != null)
                        <a target="_blank" href="{{ route('packages') }}" class="btn btn-danger text-white">Advertise Your Page</a>
                    @endif
                @endif
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
                                <th scope="col">Restaurant Name</th>
                                <th scope="col">City </th>
                                <th scope="col">Area </th>
                                <th>home_delivery</th>
                                <th scope="col">Description</th>
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($restaurantlist as $list)
                            <tr>
                                <th scope="row">{{ $list->id }}</th>
                                <td>{{ $list->restaurant_name }}</td>
                                <td>{{ $list->location }}</td>
                                <td>{{ $list->area }}</td>
                                <td>
                                    @if ($list->home_delivery =='yes')
                                        <p class="badge badge-success">Yes</p>
                                        @else
                                        <p class="badge badge-danger">No</p>
                                    @endif
                                </td>
                                <td>{{ $list->description }}</td>
                                {{-- <td>
                                    @if ($list->publish == 1)
                                        <a href="{{ route('publish',$list->id) }}" class="btn btn-success">Publish</a>
                                    @else
                                        <a href="{{ route('unpublish',$list->id) }}" class="btn btn-danger">Un Publish</a>
                                    @endif

                                </td> --}}
                                {{-- <td style="width:20%">
                                    <a href="{{ route('restaurant.edit', $list->id ) }}" class="btn btn-gradient-danger btn-rounded btn-sm"> <i class="zmdi zmdi-edit"></i> </a>
                                    <a href="{{ route('restaurant.destroy', $list->id ) }}"class="btn btn-gradient-danger btn-rounded btn-sm"> <i class="zmdi zmdi-delete"></i> </a> </td>
                                </td> --}}
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
