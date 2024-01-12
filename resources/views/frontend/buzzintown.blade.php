@extends('frontend.master')
@section('content')



<!-- Carousel wrapper starts-->
<div>
   <div class="">
      <!-- Single item -->
      <div class="">
         <div class="container">
            <div class="row my-4">
                <h2>Restaurants</h2>
                <hr class="m-2" style="height: 5px;border-radius: 10px;width:400px;background-color:#f00;opacity:1;">
            </div>
            <div class="row your-class" style="padding-top:10px;padding-bottom:10px;">
                @foreach ($restaurants as $resti)
                    @foreach ($resti->Ads as $rest)

                        @if($rest->profile_image != NULL)

                        <div class="col-lg-4 mt-3" style="margin-left: 13px;">
                            <a href="{{ route('restaurant_details',$rest->slug) }}" style="text-decoration: none;color:#212529">
                                <div class="card shadow-lg" style="border-radius: 10px;">
                                    @if ($rest->isfeature == 1)
                                        <span class="badge badge-success" style="position: absolute;background: red;right: 5px;top: 5px;">Featured</span>
                                    @endif
                                <img
                                    style="border-radius: 10px;"
                                    src="{{ asset('assets/restaurant')}}/{{ $rest->profile_image->file_name }}"
                                        class="card-img-top"
                                        alt="Restaurant Image"
                                        height="193"
                                        width="290"
                                    />
                                <div class="card-body" style="overflow: hidden;">
                                    <h5 class="card-title">{{ $rest->restaurant_name }}</h5>
                                    <p class="card-text" style="color: rgb(153, 153, 153)"  style="">
                                        {{ $rest->location }} <br>
                                        {{ $rest->area }}
                                    </p>
                                    {{-- <h6>Type: {{ $rest->category->category_name }} Home Delivery: {{ $rest->home_delivery }}</h6>
                                    <p class="card-text">
                                        {{ Illuminate\Support\Str::limit($rest->description,$limit=65,$end='. . . .') }}
                                        <br>
                                        <a href="{{ route('restaurant_details',$rest->id) }}" class="btn btn-danger">view details</a>
                                    </p> --}}
                                    <a href="{{ route('restaurant_details',$rest->slug) }}" class="btn btn-danger">view details</a>
                                </div>
                                </div>
                            </a>
                        </div>
                        @endif
                    @endforeach
                @endforeach

            </div>

            <div class="row my-4">
                <h2>New Deals</h2>
                <hr class="m-2" style="height: 5px;border-radius: 10px;width:400px;background-color:#f00;opacity:1;">
            </div>
            <div class="row your-class">
                @foreach ($feature_restaurants as $resti)
                @if(count($resti->Ads)> 0)
                {{ $resti->Ads[0]->buzzintownmenu ?? '' }}
                    <div class="col-lg-4 mt-3" style="margin-left: 13px;">
                        <a href="{{ route('restaurant_details',$resti->Ads[0]->slug) }}" style="text-decoration: none;color:#212529">
                            <div class="card shadow-lg" style="border-radius: 10px;">
                                @if ($resti->isfeature == 1)
                                <span class="badge badge-success" style="position: absolute;background: red;right: 5px;top: 5px;">Featured</span>
                                @endif
                            <img
                                style="border-radius: 10px;"
                                src="{{ asset('assets/restaurant')}}/{{ $resti->buzzintownmenu }}"
                                    class="card-img-top"
                                    alt="Restaurant Image"
                                    height="250"
                                    width="290"
                                />
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach



            </div>

         </div>
      </div>
   </div>
   <!-- Inner -->
</div>
<style>
    .slick-prev:before, .slick-next:before{
        color: black;
    }
    </style>
  <script>
$(document).ready(function(){
  $('.your-class').slick({
    centerMode: true,
    centerPadding: '60px',
    slidesToShow: 4,
    responsive: [
        {
        breakpoint: 768,
        settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 3
        }
        },
        {
        breakpoint: 480,
        settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
        }
        }
    ]
  });
});
      </script>
<!-- Carousel wrapper ends -->
@endsection
