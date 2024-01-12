@extends('frontend.master')
@push('meta_info')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/ddfullscreen.css') }}" />
<link rel="stylesheet" href="{{ asset('css/zoomio.css') }}" />
<script src="{{ asset('js/ddfullscreen.js') }}">
<script src="{{ asset('js/zoomio.js') }}"></script>

@endpush
@section('content')

<style>

#closeviewer{
    display: none !important;
}
a {
    text-decoration: none !important;
    color: inherit
}

a:hover {
    color: #455A64
}

.card {
    border-radius: 5px;
    background-color: #fff;
    padding-left: 60px;
    padding-right: 60px;
    margin-top: 30px;
    padding-top: 30px;
    padding-bottom: 30px
}

.rating-box {
    width: 130px;
    height: 130px;
    margin-right: auto;
    margin-left: auto;
    background-color: #FBC02D;
    color: #fff
}

.rating-label {
    font-weight: bold
}

.rating-bar {
    width: 300px;
    padding: 8px;
    border-radius: 5px
}

.bar-container {
    width: 100%;
    background-color: #f1f1f1;
    text-align: center;
    color: white;
    border-radius: 20px;
    cursor: pointer;
    margin-bottom: 5px
}

.bar-5 {
    width: 70%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
}

.bar-4 {
    width: 30%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
}

.bar-3 {
    width: 20%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
}

.bar-2 {
    width: 10%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
}

.bar-1 {
    width: 0%;
    height: 13px;
    background-color: #FBC02D;
    border-radius: 20px
}

td {
    padding-bottom: 10px
}

.star-active {
    color: #FBC02D;
    margin-top: 10px;
    margin-bottom: 10px
}

.star-active:hover {
    color: #F9A825;
    cursor: pointer
}

.star-inactive {
    color: #CFD8DC;
    margin-top: 10px;
    margin-bottom: 10px
}

.blue-text {
    color: #0091EA
}

.content {
    font-size: 18px
}

.profile-pic {
    width: 90px;
    height: 90px;
    border-radius: 100%;
    margin-right: 30px
}

.pic {
    width: 80px;
    height: 80px;
    margin-right: 10px
}

.vote {
    cursor: pointer
}
textarea:disabled {
    background-color: #fff !important;
    border: 0px solid gray;
}
textarea{
    font-size: 24px !important;
    max-width: 100%;
}
</style>

<!-- Carousel wrapper starts-->
<div>
   <div class="">
      <!-- Single item -->
      <div class="">
         <div class="container">
            <div class="row my-5">
                <div class="col-lg-12">
                    <h3 class="text-danger">{{ $restaurant->restaurant_name }}</h3>
                    <h5 style="color: grey;">{{ $restaurant->location }}, {{ $restaurant->area }}</h5>
                    <table class="table">
                        <tr>
                            <td><b>Home Delivery</b></td>
                            <td>
                                   @if ($restaurant->home_delivery == 'yes')
                                    <span class="px-4 pb-1 text-white" style="background: green;border-radius: 10px;">
                                            Availaible
                                    </span>
                                   @else
                                   <span class="px-4 pb-1 text-white" style="background: red;border-radius: 10px;">
                                       Not Availaible
                                    </span>
                                   @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>Breakfast</b></td>
                            <td>
                                   @if ($restaurant->breakfast == 'yes')
                                    <span class="px-4 pb-1 text-white" style="background: green;border-radius: 10px;">
                                            Availaible
                                    </span>
                                   @else
                                   <span class="px-4 pb-1 text-white" style="background: red;border-radius: 10px;">
                                       Not Availaible
                                    </span>
                                   @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>Hitea</b></td>
                            <td>
                                   @if ($restaurant->hitea == 'yes')
                                    <span class="px-4 pb-1 text-white" style="background: green;border-radius: 10px;">
                                            Availaible
                                    </span>
                                   @else
                                   <span class="px-4 pb-1 text-white" style="background: red;border-radius: 10px;">
                                       Not Availaible
                                    </span>
                                   @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>Lunch Buffet</b></td>
                            <td>
                                   @if ($restaurant->lunch_buffet == 'yes')
                                    <span class="px-4 pb-1 text-white" style="background: green;border-radius: 10px;">
                                            Availaible
                                    </span>
                                   @else
                                   <span class="px-4 pb-1 text-white" style="background: red;border-radius: 10px;">
                                       Not Availaible
                                    </span>
                                   @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>Dinner Buffet</b></td>
                            <td>
                                   @if ($restaurant->dinner_buffet == 'yes')
                                    <span class="px-4 pb-1 text-white" style="background: green;border-radius: 10px;">
                                            Availaible
                                    </span>
                                   @else
                                   <span class="px-4 pb-1 text-white" style="background: red;border-radius: 10px;">
                                       Not Availaible
                                    </span>
                                   @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>Alacarte </b></td>
                            <td>
                                   @if ($restaurant->alacate == 'yes')
                                    <span class="px-4 pb-1 text-white" style="background: green;border-radius: 10px;">
                                            Availaible
                                    </span>
                                   @else
                                   <span class="px-4 pb-1 text-white" style="background: red;border-radius: 10px;">
                                       Not Availaible
                                    </span>
                                   @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>Restaurant Type</b></td>
                            <td>

                                @if (count($restaurant->category) > 0)
                                    @for ($i = 0; $i < count($restaurant->category); $i++)
                                        <span class="badge badge-success" style="background:#008000;">{{ $restaurant->category[$i]->category_name }}</span>
                                    @endfor
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>Contact</b></td>
                            <td>
                                <span class="badge badge-success" style="background:#008000;"><a href="tel:{{ $restaurant->contact }}">{{ $restaurant->contact }}</a></span>
                                <span class="badge badge-success" style="background:#008000;"><a href="tel:{{ $restaurant->cellno }}">{{ $restaurant->cellno }}</a></span>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Get Direction</b></td>
                            <td>
                                <span class="badge badge-info" style="background:#013af8;"><a target="_blank" href="http://maps.google.com/maps?daddr={{ $restaurant->lat }},{{ $restaurant->lng }}">Click Here</a></span>

                            </td>
                        </tr>

                    </table>
                    <div class="row">
                        @foreach ($restaurant->images as $imagemenu)
                            @if ($imagemenu->image_for == 5)
                                <div class="col-lg-4">
                                    <a href="{{ asset('assets/restaurant') }}/{{ $imagemenu->file_name }}" target="_blank">
                                <img style="height: 200px; width:100%;" class="img-thumbnail thumbnails" src="{{ asset('assets/restaurant') }}/{{ $imagemenu->file_name }}" alt="">
                            </a>
                                </div>
                            @endif
                        @endforeach
                    </div>


                </div>
                <div class="col-lg-12 mt-4">
                    <h2>Additional Information </h2>
                    <hr class="m-2" style="height: 5px;border-radius: 10px;width:300px;background-color:#f00;opacity:1;">
                    <textarea style="resize: none;" name="description" id="description" cols="83"  disabled>{{ $restaurant->description }}</textarea>
                </div>
                @php
                    $value = false;
                @endphp
                @foreach ($restaurant->images as $imagemenu)
                    @if ($imagemenu->image_for == 1)
                        @if(!$value)
                            <div class="col-lg-12">
                                <h2>Menu </h2>
                                <hr class="m-2" style="height: 5px;border-radius: 10px;width:300px;background-color:#f00;opacity:1;">
                            </div>
                            @php $value =true;  @endphp
                        @endif
                        <div class="col-lg-4 mt-4 imgss" id="iv" >
                            <a href="{{ asset('assets/restaurant') }}/{{ $imagemenu->file_name }}" target="_blank">
                                <img style="height: 200px; width:100%;" class="img-thumbnail thumbnails" src="{{ asset('assets/restaurant') }}/{{ $imagemenu->file_name }}" alt="">
                            </a>
                        </div>
                    @endif
                @endforeach
                @php
                    $value = false;
                @endphp

                @foreach ($restaurant->images as $imagemenu)
                    @if ($imagemenu->image_for == 2)
                    @if(!$value)
                        <div class="col-lg-12 mt-5">
                            <h2>Buffet Menu </h2>
                            <hr class="m-2" style="height: 5px;border-radius: 10px;width:300px;background-color:#f00;opacity:1;">
                        </div>
                        @php $value =true;  @endphp
                    @endif
                        <div class="col-lg-4 mt-4">
                            <a href="{{ asset('assets/restaurant') }}/{{ $imagemenu->file_name }}" target="_blank">
                                <img style="height: 200px; width:100%;" class="img-thumbnail thumbnails" src="{{ asset('assets/restaurant') }}/{{ $imagemenu->file_name }}" alt="">
                            </a>
                        </div>
                    @endif
                @endforeach
                @php
                    $value = false;
                @endphp

                @foreach ($restaurant->images as $imagemenu)
                    @if ($imagemenu->image_for == 3)
                        @if(!$value)
                            <div class="col-lg-12 mt-5">
                                <h2>Hitea Menu </h2>
                                <hr class="m-2" style="height: 5px;border-radius: 10px;width:300px;background-color:#f00;opacity:1;">
                            </div>
                            @php $value =true;  @endphp
                        @endif
                        <div class="col-lg-4 mt-4">
                            <a href="{{ asset('assets/restaurant') }}/{{ $imagemenu->file_name }}" target="_blank">
                                <img style="height: 200px; width:100%;" class="img-thumbnail thumbnails" src="{{ asset('assets/restaurant') }}/{{ $imagemenu->file_name }}" alt="">
                            </a>
                        </div>
                    @endif
                @endforeach

                @php
                    $value = false;
                @endphp

                @foreach ($restaurant->images as $imagemenu)
                    @if ($imagemenu->image_for == 6)
                        @if(!$value)
                            <div class="col-lg-12 mt-5">
                                <h2>Brunch Menu </h2>
                                <hr class="m-2" style="height: 5px;border-radius: 10px;width:300px;background-color:#f00;opacity:1;">
                            </div>
                            @php $value =true;  @endphp
                        @endif
                        <div class="col-lg-4 mt-4 imgss" >
                            <a href="{{ asset('assets/restaurant') }}/{{ $imagemenu->file_name }}" target="_blank">
                                <img style="height: 200px; width:100%;" class="img-thumbnail thumbnails" src="{{ asset('assets/restaurant') }}/{{ $imagemenu->file_name }}" alt="">
                            </a>
                        </div>
                    @endif
                @endforeach

                <div class="col-lg-12 mt-5">
                    <h2>Reviews </h2>
                    <hr class="m-2" style="height: 5px;border-radius: 10px;width:300px;background-color:#f00;opacity:1;">
                </div>
               <div class="col-lg-12 my-4">
                    <div class="row">
                        <div class="col-lg-2">
                            <img style="display: flex;" src="{{ asset('photo.jpg') }}" height="70" width="70" alt="">
                        </div>
                        <div class="col-lg-9">
                            <form action="{{ route('add_review') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $restaurant->id }}" name="id">
                                <input type="text" class="form-control" name="name" placeholder="Your Name" required >
                                <input type="text" class="form-control mt-2" name="review" placeholder="Enter review" required>
                                <input type="submit" class="form-control btn btn-primary mt-2"  value="Submit" >
                            </form>
                        </div>
                    </div>
               </div>
               <div class="col-lg-12 my-4">
                    @foreach ($reviews as $review)
                        <div class="row">
                            <div class="col-lg-1">
                                <img style="display: flex;" src="{{ asset('photo.jpg') }}" height="50" width="50" alt="">
                            </div>
                            <div class="col-lg-10">
                                <h4>{{ $review->name }}</h4>
                                <p>
                                    {{ $review->review }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Inner -->
</div>
<!-- Carousel wrapper ends -->
<script>
$(document).ready(function(){
    // $('img.thumbnails').fullscreenimage({
    //  scale: 1.5 // magnify by 2 times when mouse moves over full screen image (set to 1 to disable)
    // });
    // $('#iv').imageview();
    $("textarea").each(function () {
        this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
    }).on("input", function () {
        this.style.height = "auto";
        this.style.height = (this.scrollHeight) + "px";
    });

});

</script>
@endsection
