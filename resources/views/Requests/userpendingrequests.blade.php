@extends('layout.master')
@section('title', 'Requests')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/sweetalert/sweetalert.css')}}"/>
@stop
{{-- @section('parentPageTitle', 'Categories') --}}
@section('content')
    <div class="row clearfix">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h2><strong>Request</strong> List</h2>
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
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th scope="col">ID#</th>
                                    <th>Date</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Price </th>
                                    <th scope="col">Package Name </th>
                                    <th>Payment Status</th>
                                    <th scope="col">Ad Status</th>
                                    <th>Days</th>
                                    <th scope="col">Payment Receipt</th>
                                    <th>Deal Poster</th>
                                    <th>View Restaurant</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $list)
                                <tr>
                                    <td scope="row">{{ $list->id }}</td>
                                    <td>{{ $list->created_at }}</td>
                                    <td>
                                        @if ($list->adtype == 1)
                                            <span class="badge badge-info">Feature Ad</span>
                                        @endif
                                        @if ($list->adtype == 2)
                                            <span class="badge badge-primary">Buzz in town Ad</span>
                                        @endif
                                    </td>
                                    <td>PKR {{ $list->price }} /-</td>
                                    <td>
                                        <p class="badge badge-success">{{ $list->package_name }}</p>
                                    </td>
                                    <td>
                                        @if ($list->payment_status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                            @if (Auth::user()->hasRole('admin'))
                                            <form action="{{ route('change_payment_status') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $list->id }}">
                                                <input type="submit" name="accept" value="Accept" class="btn btn-sm btn-success">
                                            </form>
                                        @endif
                                        @endif
                                        @if ($list->payment_status == 1)
                                            {{-- @if (Auth::user()->hasRole('admin'))
                                                <form action="{{ route('change_payment_status') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $list->id }}">
                                                    <input type="submit" name="accept" value="Reject" class="btn btn-sm btn-danger">
                                                </form>
                                            @endif --}}
                                            <span class="badge badge-success">Accepted</span>
                                        @endif
                                        @if ($list->payment_status == 2)
                                            @if (Auth::user()->hasRole('admin'))
                                                <form action="{{ route('change_payment_status') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $list->id }}">
                                                    <input type="submit" name="accept" value="Accept" class="btn btn-sm btn-success">
                                                </form>
                                            @endif
                                            <span class="badge badge-danger">Rejected</span>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($list->ad_status == 0)
                                            <span class="badge badge-warning">Pending</span>
                                            @if ($list->payment_status == 1)
                                                @if (Auth::user()->hasRole('admin'))
                                                    <form action="{{ route('change_ad_status') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $list->id }}">
                                                        <input type="submit" name="accept" value="Publish" class="btn btn-sm btn-success">
                                                    </form>
                                                @endif
                                            @endif
                                        @endif
                                        @if ($list->ad_status == 1)
                                            <span class="badge badge-primary">Published</span>
                                            @if (Auth::user()->hasRole('admin'))
                                            <form action="{{ route('change_ad_status') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $list->id }}">
                                                <input type="submit" name="accept" value="Unpublish" class="btn btn-sm btn-success">
                                            </form>
                                        @endif
                                        @endif
                                        @if ($list->ad_status == 2)
                                            <span class="badge badge-danger">Completed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge badge-danger">{{ $list->days }}</span>
                                    </td>
                                   <td>
                                       <a href="{{ asset('assets/restaurant') }}/{{ $list->file_name }}" download class="btn  btn-sm btn-info">Receipt</a>
                                   </td>
                                   <td>
                                        @if ($list->buzzintownmenu != null)
                                        <a href="{{ asset('assets/restaurant') }}/{{ $list->buzzintownmenu }}" download class="btn  btn-sm btn-info">Poster</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if(count($list->Ads) > 0)
                                        <a target="_blank" href="{{ route('restaurant_details',$list->Ads[0]->slug) }}" class="btn btn-info btn-sm">view</a>
                                        @else
                                         <span class="badge badge-danger">Restaurant Deleted</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::user()->hasRole('admin'))
                                            <a href="{{ route('delete_request',$list->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
@stop
@section('page-script')
<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/pages/ui/sweetalert.js')}}"></script>

@stop

