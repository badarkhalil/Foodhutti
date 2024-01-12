@extends('layout.master')
@section('title', 'Update Restaurant')
@section('parentPageTitle', 'Restaurant')
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
                <h2><strong>Update</strong> Restaurant</h2>
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
                <form action="{{ route('restaurant.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="lat" value="-1" name="lat">
                    <input type="hidden" id="lng" value="-1" name="lng">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <label for="">Restaurant Name</label>
                            <input type="text" id="restaurant_name" name="restaurant_name" class="form-control" value="{{ $data->restaurant_name }}" placeholder="Enter Restaurant Name" required>
                        </div>
                        <div class="form-group col-lg-4 col-sm-8">
                            <label for="">Display Picture</label>
                            <input type="file" class="form-control-file border" name="file" id="file" value="{{ $data->profile_image->file_name }}" >
                        </div>
                        <div class="form-group col-lg-2 col-sm-4">
                            <img id="dp_pic" height="50" width="50" src="{{ asset('assets/restaurant') }}/{{ $data->profile_image->file_name }}" alt="asd">
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <label for="">Enter City</label>
                            <select id="location" value="{{ old('location') }}" name="location" class="form-control" required>
                                <option disabled selected>Select City</option>
                                <option value="Islamabad" @if($data->location == "Islamabad") selected @endif>Islamabad</option>
                                <option value="Rawalpindi" @if($data->location == "Rawalpindi") selected @endif>Rawalpindi</option>
                                <option value="Lahore" @if($data->location == "Lahore") selected @endif>Lahore</option>
                                <option value="Multan" @if($data->location == "Multan") selected @endif>Multan</option>
                                <option class="Karachi" @if($data->location == "Karachi") selected @endif>Karachi</option>
                                <option value="Peshawar" @if($data->location == "Peshawar") selected @endif>Peshawar</option>
                                <option value="Quetta" @if($data->location == "Quetta") selected @endif>Quetta</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Enter Area <small>(Enter your restaurant name and select from the list that appears with your address)</small> </label>
                            <input type="text" value="{{ $data->area }}" id="area" name="area" class="form-control" placeholder="Enter Area">
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Restaurant Category <small>(choose multiple, if applicable)</small></label>
                            <select multiple class="form-control-file border" name="category_id[]" required>
                                <option disabled>Select Category</option>
                                @foreach ($categories as $category)
                                @php $match = false; @endphp
                                    @foreach ($data->category as $cat)
                                        @if ($cat->category_id == $category->id)
                                            <option selected value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @php $match = true; @endphp
                                        @endif
                                    @endforeach
                                    @if(!$match)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Home Delivery</label>
                            <select class="form-control-file border" name="home_delivery" required>
                                <option value="0" selected disabled>Select Delivery</option>
                                <option @if ($data->home_delivery == 'yes') selected @endif value="yes">Yes</option>
                                <option @if ($data->home_delivery == 'no') selected @endif value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Breakfast</label>
                            <select class="form-control-file border" name="breakfast" required>
                                <option value="0" selected disabled>Select</option>
                                <option @if ($data->breakfast == 'yes') selected @endif value="yes">Yes</option>
                                <option @if ($data->breakfast == 'no') selected @endif value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Hitea</label>
                            <select class="form-control-file border" name="hitea" required>
                                <option value="0" selected disabled>Select</option>
                                <option @if ($data->hitea == 'yes') selected @endif value="yes">Yes</option>
                                <option @if ($data->hitea == 'no') selected @endif value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Lunch Buffet</label>
                            <select class="form-control-file border" name="lunch_buffet" required>
                                <option value="0" selected disabled>Select</option>
                                <option @if ($data->lunch_buffet == 'yes') selected @endif value="yes">Yes</option>
                                <option @if ($data->lunch_buffet == 'no') selected @endif value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Dinner Buffet</label>
                            <select class="form-control-file border" name="dinner_buffet" required>
                                <option value="0" selected disabled>Select</option>
                                <option @if ($data->dinner_buffet == 'yes') selected @endif value="yes">Yes</option>
                                <option @if ($data->dinner_buffet == 'no') selected @endif value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Alacarte </label>
                            <select class="form-control-file border" name="alacate" required>
                                <option value="0" selected disabled>Select</option>
                                <option @if ($data->alacate == 'yes') selected @endif value="yes">Yes</option>
                                <option @if ($data->alacate == 'no') selected @endif value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Brunch</label>
                            <select class="form-control-file border" name="brunch_menu" required>
                                <option selected disabled>Select</option>
                                <option @if ($data->brunch_menu == 'yes') selected @endif value="yes">Yes</option>
                                <option @if ($data->brunch_menu == 'no') selected @endif value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Contact Number</label>
                            <input type="contact" class="form-control" value="{{ $data->contact }}" name="contact" id="contact" required>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Cell Number (Optional)</label>
                            <input type="text" class="form-control" value="{{ $data->cellno }}" name="cellno" id="cellno" >
                        </div>
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="">Additional Information</label>
                            <br>
                            <textarea name="description" id="description" cols="90" rows="10">{{ $data->description }}</textarea>
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-raised btn-primary btn-round waves-effect">Save</button>
                    <a data-toggle="modal" data-target="#exampleModal" href="" class="text-center btn btn-raised btn-danger btn-round waves-effect">Delete</a>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialogmain modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
               <div class="row">
                    <div class="col-12">
                        <h1 class="text-danger text-center">Deleting</h1>
                        <p class="text-center">Are you sure want to delete your restaurant?</p>
                        <p class="text-center">
                            <a href="{{ route('restaurant.destroy',$data->id) }}" class="btn btn-danger">Yes</a>
                            <a href="" class="btn btn-success">No</a>
                        </p>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>

@stop
@section('page-script')
<script>
    function initMap(){
        google.maps.event.addDomListener(window, 'load', function() {
            var places = new google.maps.places.Autocomplete(document
                    .getElementById('area'));
                google.maps.event.addListener(places, 'place_changed', function() {
                    var place = places.getPlace();
                    var address = place.formatted_address;
                    var  value = address.split(",");
                    count=value.length;
                    // country=value[count-1];
                    // state=value[count-2];
                    // city=value[count-3];
                    // var z=state.split(" ");
                    // document.getElementById("exampleFormControlSelect1").innerHTML  = "<option selected value="+city+">"+city+"</option>";
                    // console.log(city);
                    // var i =z.length;
                    // document.getElementById("pstate").value = z[1];
                    // if(i>2)
                    // document.getElementById("pzcode").value = z[2];
                    // document.getElementById("pCity").value = city;
                    var latitude = place.geometry.location.lat();
                    var longitude = place.geometry.location.lng();
                    $("#lat").val(latitude);
                    $("#lng").val(longitude);
                    console.log(latitude);

                });
        });
    }
    </script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL3G1puhURysAprsEMROzyKM-X4oZDWik&libraries=places&callback=initMap">
    </script>
<script src="{{asset('assets/plugins/dropzone/dropzone.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/dist/summernote.js')}}"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#dp_pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
        $("#file").on('change',function(){
            readURL(this);
        });
    });
    </script>
@stop
