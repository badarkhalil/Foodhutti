<!DOCTYPE html>
<html style="font-size: 16px;">
   @include('frontend.layout.head')
   <body data-home-page-title="Home" class="u-body">
       <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TLZCJSF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
      @include('frontend.layout.header')
      <div class="container-fluid">

            @include('frontend.layout.herosection')

      </div>
      <div class="container-fluid">
         <div class="row mt-4">
            <div class="col-sm-10 col-md-8 col-lg-9">
               @yield('content')
            </div>
            <div class="col-sm-2 col-md-4 col-lg-3 mx-auto">
                <br><br>
                @php
                    $adsside = App\Models\Ads::where('adtype',2)->where('publish',1)->first();
                @endphp
                @if ($adsside == null)
                <a href="https://wa.me/03325628860" target="_blank" style="text-decoration: none;color:gray;">
                    <div class="text-center" style="height: 400px;width:100%;background-color: #ececec;position: relative;">
                        <p class="mt-5" style="position: absolute;font-size: 30px; color: gray;width:100%;" class="text-center mb-0">400 x 400</p>
                        <small style="font-size:26px;">To let click here</small>
                    </div>
                </a>

                @else
                    <a href="{{ $adsside->url }}" target="_blank">
                        <img
                        src="{{ asset('assets/restaurant') }}/{{ $adsside->file_name }}"
                            class="rounded mx-auto d-block"
                            alt="Waterfall"
                            style="width: 100%;height:400px;"
                            />
                    </a>
                @endif
                <br><br>
                @php
                    $adsside2 = App\Models\Ads::where('adtype',3)->where('publish',1)->first();
                @endphp
                @if ($adsside2 == null)
                <a href="https://wa.me/03325628860" target="_blank" style="text-decoration: none;color:gray;">
                    <div class="text-center" style="height: 390px;width:100%;background-color: #ececec;position: relative;">
                        <p class="mt-5" style="position: absolute;font-size: 30px; color: gray;width:100%;" class="text-center mb-0">400 x 400</p>
                        <small style="font-size:26px;">To let click here</small>
                    </div>
                </a>
                @else
                <a href="{{ $adsside2->url }}" target="_blank">
                    <img
                        src="{{ asset('assets/restaurant') }}/{{ $adsside2->file_name }}"
                        class="rounded mx-auto d-block"
                        alt="Waterfall"
                        style="width: 100%;height:400px;"
                        />
                </a>
                @endif

                @if(isset($recommended_restaurants))
                    <div class="row">
                        <h2 class="mt-2">Other Restaurant</h2>
                        @foreach ($recommended_restaurants as $restaurantrec)
                            <div class="col-lg-12 col-sm-12 mt-3 shadow-lg rounded p-3" style="border: 1px solid rgb(238, 238, 238);">
                                <a href="{{ route('restaurant_details',$restaurantrec->slug) }}" class="row">
                                    <div class="col-lg-3 col-sm-3">
                                        <img height="80px" width="80px" src="{{ asset('assets/restaurant')}}/{{ $restaurantrec->profile_image->file_name }}" alt="">
                                    </div>
                                    <div class="col-lg-1 col-sm-1"></div>
                                    <div class="col-lg-8 col-sm-8">
                                        <h5>{{ $restaurantrec->restaurant_name }}</h5>
                                        <p style="color: gray;">{{ $restaurantrec->location }},{{ $restaurantrec->area }}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
         </div>
      </div>
      @include('frontend.layout.footer')
      <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YF65KZ1Y1Q"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YF65KZ1Y1Q');
</script>
   </body>
</html>
