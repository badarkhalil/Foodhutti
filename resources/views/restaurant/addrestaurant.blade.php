@extends('layout.master')
@section('title', 'Add Restaurants')
@section('parentPageTitle', 'Restaurants')
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
                @if (session()->has('message'))
                    <div class="alert alert-danger">
                        <p>You are already a restaurant owner</p>
                    </div>
                @endif
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
                <div class="row">
                    <div class="col-lg-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                <form action="{{ route('restaurant.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="lat" value="-1" name="lat">
                    <input type="hidden" id="lng" value="-1" name="lng">
                    <div class="row">
                        <div class="form-group col-lg-6 col-sm-12">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <label for="">Restaurant Name</label>
                            <input type="text" id="restaurant_name" name="restaurant_name" value="{{ old('restaurant_name') }}" class="form-control" placeholder="Enter Restaurant Name" required>
                        </div>

                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Display Picture</label>
                            <input type="file" class="form-control-file border" name="file" id="file" required>

                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Enter City</label>
                            <select id="location" value="{{ old('location') }}" name="location" class="form-control" required>
                                <option disabled selected>Select City</option>
                                <option value="Islamabad">Islamabad</option>
                                <option value="Rawalpindi">Rawalpindi</option>
                                <option value="Lahore">Lahore</option>
                                <option value="Multan">Multan</option>
                                <option class="Karachi">Karachi</option>
                                <option value="Peshawar">Peshawar</option>
                                <option value="Quetta">Quetta</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Enter Area <small>(Enter your restaurant name and select from the list that appears with your address)</small> </label>
                            <input type="text" value="{{ old('area') }}" id="area" name="area" class="form-control" placeholder="Enter Address" required>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Home Delivery</label>
                            <select class="form-control-file border" name="home_delivery" required>
                                <option value="0" selected disabled>Select Delivery</option>
                                <option @if (old('home_delivery') == 'yes') selected @endif value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Restaurant Category <small>(choose multiple, if applicable)</small></label>
                            <select multiple class="form-control-file border" name="category_id[]" required>
                                <option disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Breakfast</label>
                            <select class="form-control-file border" name="breakfast" required>
                                <option value="0" selected disabled>Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Hitea</label>
                            <select class="form-control-file border" name="hitea" required>
                                <option value="0" selected disabled>Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Lunch Buffet</label>
                            <select class="form-control-file border" name="lunch_buffet" required>
                                <option value="0" selected disabled>Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Dinner Buffet</label>
                            <select class="form-control-file border" name="dinner_buffet" required>
                                <option value="0" selected disabled>Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Brunch</label>
                            <select class="form-control-file border" name="brunch_menu" required>
                                <option value="0" selected disabled>Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Alacarte</label>
                            <select class="form-control-file border" name="alacate" required>
                                <option value="0" selected disabled>Select</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>

                       {{-- <div class="col-md-12 py-3">
                            <h3>Select Multiple Images to Upload</h3>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Menu Attachment (Image)</label>
                            <input multiple type="file" class="form-control border" name="menu_attachment[]" id="file" required>
                        </div> --}}

                       {{--   <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Buffet Menu Attachment (Optional)</label>
                            <input multiple type="file" class="form-control-file border" name="buffet_attachment[]" id="file">
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Hi-Tea Menu Attachment (Optional)</label>
                            <input multiple type="file" class="form-control-file border" name="hitea_attachment[]" id="file">
                        </div> --}}
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Phone Number</label>
                            <input type="contact" class="form-control" name="contact" id="contact" required>
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="">Cell Number (Optional)</label>
                            <input type="text" class="form-control" name="cellno" id="cellno" >
                        </div>
                        <div class="form-group col-lg-12 col-sm-12">
                            <label for="">Additional Inforamtion</label>
                            <br>
                            <textarea required name="description" id="description" cols="90" rows="10" placeholder="Enter other information such as buffet time, hitea information etc"></textarea>
                        </div>
                    </div>


                    <button type="submit" name="submit" class="btn btn-raised btn-primary btn-round waves-effect">Submit</button>
                </form>
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
@stop
