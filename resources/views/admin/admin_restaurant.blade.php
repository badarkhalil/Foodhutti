@extends('layout.master')
@section('title', 'Restaurants')
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
                    <h2><strong>Restaurant</strong> List</h2>
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
                                    <th scope="col">Restaurant Name</th>
                                    <th scope="col">City </th>
                                    <th scope="col">Area </th>
                                    <th>home_delivery</th>
                                    <th scope="col">Description</th>
                                    <th>Contact</th>
                                    <th scope="col">Feature</th>
                                    <th>Action</th>
                                    <th>View</th>
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
                                    <td>{{ $list->contact }}</td>
                                    <td style="width:20%">
                                    @if($list->isfeature == 0)
                                    <a href="{{ route('make_feature',$list->id) }}" class="btn btn-success">Make Feature</a>
                                    @else
                                    <a href="{{ route('make_feature',$list->id) }}" class="btn btn-danger">Remove Feature</a>
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('restaurant.edit', $list->id ) }}" class="btn btn-gradient-danger btn-rounded btn-sm"> <i class="zmdi zmdi-edit"></i> </a>
                                        <a href="javascript:deleteModal({{ $list->id }});"class="btn btn-gradient-danger btn-rounded btn-sm"> <i class="zmdi zmdi-delete"></i> </a> </td>
                                    </td>
                                    <td>
                                        <a target="_blank" href="{{ route('restaurant_details',$list->slug) }}" class="btn btn-sm btn-primary">View</a>
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

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Delete Confirmation?
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this restaurant?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a id="setanchor"  class="btn btn-danger text-white btn-ok">Yes</a>
                </div>
            </div>
        </div>
    </div>

 <script>
     function deleteModal(id){
         var url = "{{ url('restaurant/destroy') }}/"+id;
         $("#setanchor").attr('href',url)
        $("#confirm-delete").modal("show");
     }
 </script>
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

