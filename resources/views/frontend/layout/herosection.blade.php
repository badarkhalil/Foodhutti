<style>
    .card-1{
        background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
    }

    .card-2{
        background-color: #0093E9;
    background-image: linear-gradient(160deg, #0093E9 0%, #80D0C7 100%);
    }

    .card-3{
        background-color: #00DBDE;
    background-image: linear-gradient(90deg, #00DBDE 0%, #FC00FF 100%);
    }

    .card-4{
        background-color: #FBAB7E;
    background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);
    }

    .card-5{
        background-color: #85FFBD;
    background-image: linear-gradient(45deg, #85FFBD 0%, #FFFB7D 100%);
    }

    .card-6{
        background-color: #FA8BFF;
    background-image: linear-gradient(45deg, #FA8BFF 0%, #2BD2FF 52%, #2BFF88 90%);
    }

    .card-7{
        background-color: #FA8BFF;
    background-image: linear-gradient(45deg, #FA8BFF 0%, #2BD2FF 52%, #2BFF88 90%);
    }

    .card-8{
        background-color: #FBDA61;
    background-image: linear-gradient(45deg, #FBDA61 0%, #FF5ACD 100%);
    }

    .card-9{
        background-color: #4158D0;
    background-image: linear-gradient(43deg, #4158D0 0%, #C850C0 46%, #FFCC70 100%);
    }

    .card-10{
        background-color: #FF3CAC;
    background-image: linear-gradient(225deg, #FF3CAC 0%, #784BA0 50%, #2B86C5 100%);

    }
    @media screen and (min-width: 480px) {
        #buzztownoin{
            display: none;
        }
    }

</style>


      <div class="row">
        <div id="buzztownoin" class="col-sm-12 my-2" style="text-align: center;">
            <a href="{{ route('buzzintown') }}" class="btn btn-danger" >Buzz in Town</a>
        </div>
        <div class="col-lg-1 col-sm-0"></div>
        <div class="col-lg-10 col-sm-12">
            @php
                $ads = App\Models\Ads::where('adtype',1)->where('publish',1)->first();
            @endphp
            @if ($ads == null)
                <a href="https://wa.me/03325628860" target="_blank" style="text-decoration: none;color:gray;">
                    <div class="text-center" style="height: 200px;width:100%;background-color: #ececec;position: relative;">
                        <p class="mt-3" style="position: absolute;font-size: 60px; color: gray;width:100%;" class="text-center mb-0">1100 x 200</p>
                        <small  style="font-size:26px;">To let click here</small>
                    </div>
                </a>
            @else
                <a href="{{ $ads->url }}" target="_blank">
                    <img  class="d-block m-auto" style="width:100%;"  height="200" src="{{ asset('assets/restaurant') }}/{{ $ads->file_name }}" alt="Second slide">
                </a>
            @endif
        </div>
        <div class="col-lg-1 col-sm-0"></div>
      </div>
      @if (Request::segment(1) == 'searchbycategory')
      <section class="search-sec">
        <div class="container">
            <form action="{{ route('searchcategorysearch',Request::segment(2)) }}" method="post"  id="formid">
                @csrf
                <input type="hidden" id="lat" value="-1" name="lat">
                <input type="hidden" id="lng" value="-1" name="lng">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 ">
                                <input type="text" name="name" class="form-control search-slt" id="abcs" placeholder="Restaurant Name">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <select name="city" class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option value="0" selected>Select City</option>
                                    <option value="Islamabad">Islamabad</option>
                                    <option value="Rawalpindi">Rawalpindi</option>
                                    <option value="Lahore">Lahore</option>
                                    <option value="Multan">Multan</option>
                                    <option class="Karachi">Karachi</option>
                                    <option value="Peshawar">Peshawar</option>
                                    <option value="Quetta">Quetta</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 ">
                                <input name="area" id="area" type="text" class="form-control search-slt" placeholder="Enter Area">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 ">
                                <button type="submit" class="btn btn-success wrn-btn">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
      @endif
@if (!Request::segment(1) == 'details')

    <section class="search-sec">
        <div class="container">
            <form action="{{ route('search_filter') }}" method="get" >
                @csrf
                <input type="hidden" id="lat" value="-1" name="lat">
                <input type="hidden" id="lng" value="-1" name="lng">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-12 ">
                                <input id="restaurant_name" type="text" name="name" class="form-control search-slt" placeholder="Restaurant Name">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <select name="city" class="form-control search-slt" id="exampleFormControlSelect1">
                                    <option value="0">Select City</option>
                                    <option value="Islamabad">Islamabad</option>
                                    <option value="Rawalpindi">Rawalpindi</option>
                                    <option value="Lahore">Lahore</option>
                                    <option value="Multan">Multan</option>
                                    <option class="Karachi">Karachi</option>
                                    <option value="Peshawar">Peshawar</option>
                                    <option value="Quetta">Quetta</option>
                                </select>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 ">
                                <input id="area" name="area" type="text" class="form-control search-slt" placeholder="Enter Area">
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 ">
                                <button type="submit" class="btn btn-success wrn-btn">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <nav style="flex-wrap:nowrap;overflow-x:auto;" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">


            <div  class="navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav">
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($data as $data1 )
                        @if ($i <= 7)
                            <a href="{{ route('searchbycategory',$data1->id) }}" class="nav-item nav-link active">
                                <img width="20%" class="img-circle" src="{{ asset('images/uploads/' . $data1->file) }}" />
                                <span style="font-size:20px;margin:auto;font-weight: 600;">  {{ $data1->category_name }}</span>
                            </a>
                        @endif
                    @php
                        $i++;
                    @endphp

                        {{-- <a href="#" class="nav-item nav-link active">Home</a> --}}
                    @endforeach
                </div>
                <div class="navbar-nav" style="border-radius: 9px;">
                    <a class="bg-success text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" href="" style="font-size:20px;margin:auto;font-weight: 600;">More</a>
                </div>
            </div>
        </div>
    </nav>

@endif

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialogmain modal-fullscreen-lg-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">All Categories</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="row">
                        @foreach ($data as $data )
                            <div class="col-lg-3 col-sm-1">
                                <a href="{{ route('searchbycategory',$data->id) }}" class="nav-item nav-link active" style="display: flex;">
                                    <img width="20%" class="img-circle" src="{{ asset('images/uploads/' . $data->file) }}" />
                                    <span style="font-size:20px;margin:auto;font-weight: 600;color:black;">  {{ $data->category_name }}</span>
                                </a>
                            </div>
                        @endforeach
                   </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#area').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

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
