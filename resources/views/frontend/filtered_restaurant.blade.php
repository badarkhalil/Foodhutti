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
            <div class="row">
                @if (isset($restaurants))


                    @if (count($restaurants) > 0)
                        @foreach ($restaurants as $rest)

                        @if($rest->profile_image != NULL)

                        <div class="col-lg-3 mt-3">
                            <a href="{{ route('restaurant_details',$rest->slug) }}" style="text-decoration: none;color:#212529">
                                <div class="card shadow-lg" style="border-radius: 10px;">
                                    @if ($rest->isfeature == 1)
                                        <span class="badge badge-success" style="position: absolute;background: red;right: 5px;top: 5px;">Featured</span>
                                    @endif
                                <img
                                style="border-radius:10px;"
                                    src="{{ asset('assets/restaurant')}}/{{ $rest->profile_image->file_name }}"
                                        class="card-img-top"
                                        alt="Restaurant Image"
                                        height="193"
                                        width="290"
                                    />
                                <div class="card-body" style="overflow: hidden;">
                                    <h5 class="card-title">{{ $rest->restaurant_name }}</h5>
                                    <p class="card-text" style="color: rgb(153, 153, 153)">
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

                    @else
                        <div class="alert alert-danger">
                            <p>No restaurant found, please search again with different filter</p>
                        </div>
                    @endif
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                               @if(!is_array($restaurants))
                                    {{ $restaurants->links() }}
                               @endif
                            </div>
                        </div>
                    </div>
                @endif


                {{-- Search By Category --}}

                @if (isset($datasearch))

                    @if (count($datasearch) > 0)
                    @foreach ($datasearch as $rest)
                    @if($rest->profile_image != NULL)

                    <div class="col-lg-3 mt-3">
                        <a href="{{ route('restaurant_details',$rest->slug) }}" style="text-decoration: none;color:#212529">
                            <div class="card shadow-lg" style="border-radius: 10px;">
                                @if ($rest->isfeature == 1)
                                        <span class="badge badge-success" style="position: absolute;background: red;right: 5px;top: 5px;">Featured</span>
                                @endif
                            <img
                            style="border-radius:10px;"
                                src="{{ asset('assets/restaurant')}}/{{ $rest->profile_image->file_name }}"
                                    class="card-img-top"
                                    alt="Restaurant Image"
                                    height="193"
                                    width="290"
                                />
                                <div class="card-body" style="overflow: hidden;">
                                    <h5 class="card-title">{{ $rest->restaurant_name }}</h5>
                                    <p class="card-text" style="color: rgb(153, 153, 153)">
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
                    @else
                        <div class="alert alert-danger">
                            <p>No restaurant found, please search again with different filter</p>
                        </div>
                    @endif
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                               @if(!is_array($datasearch))
                                    {{ $datasearch->links() }}
                               @endif
                            </div>
                        </div>
                    </div>
                @endif

            </div>

         </div>
      </div>
   </div>
   <!-- Inner -->
</div>
<!-- Carousel wrapper ends -->
<style>
.page-item.active .page-link{
    z-index: 3;
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
}
.page-link {
    color: #333;
    background-color: #fff;
    border: 1px solid #ccc;
}

.page-link:hover {
    color: #fff;
    background-color: #333;
    border-color: #333;
}

.active .page-link {
    color: #fff;
    background-color: #333;
    border-color: #333;
}


</style>
@endsection
