@extends('frontend.master')
@section('content')
<style>
    .card {
    max-width: 700px;
    padding: 6vh;
    padding-top: 7px !important;
    border: none;
    border-radius: 0;
    margin-bottom: 5%;
    margin-top: 5%;
    display: block;
    box-shadow: 0 0 15px #dae0e5
}

i.far {
    margin-right: 13px;
    color: #bb04e9
}

.container.kl {
    border: 1px solid #e9ecef;
    border-radius: 5px;
    margin-top: 20px
}

.kl:hover {
    border: 2px solid #834bd1;
    cursor: pointer
}

label.form-check-label {
    font-size: 16px
}

.note {
    border-radius: 15px;
    border: none;
    border-color: grey;
    background: #e9ecef;
    padding: 8px;
    font-weight: bold;
    font-size: 10px;
    color: #bb04e9
}

span.text-muted {
    font-size: 12px
}

span.rate {
    margin-left: 200px
}

span.nrate {
    margin-left: 90px
}

.btn.btn-lg {

}

.btn.btn-lg span {
    text-align: center;
    font-size: 18px
}

@media(max-width:768px) {
    .card {
        padding: 2vh;
        width: 100%
    }

    span.rate {
        margin-left: 150px
    }

    span.nrate {
        margin-left: 40px
    }
}
</style>
<div class="container-fluid rounded" >
    <h1 class="text-danger">Feature Ads Pricing</h1>
    <small>Get your Restaurant featured amongst the first few searched results.</small>
    <div class="row" style="padding: 20px;">
        <div class="col-lg-4 col-sm-12">
            <div class="card mx-auto">
                <div class="card-body">
                    <div class="logo mb-1"><img src="{{ asset('assets/images/frontendimages/logo.png') }}" height="100" width="100" /></div>
                    <h3 class="card-title">Diamond <small>(30 Days Monthly)</small></h3>
                    <h6 class="card-subtitle  text-muted">15000/- PKR</h6>
                    <div class="row rone ">
                        <div class="col-md-12">
                        <ul>
                            <li>Appear under Feature Ads on homepage.</li>
                            <li>Amongst the top of searched results.</li>
                            <li>More chances to be noticed seen and clicked by the customer</li>
                        </ul>
                        </div>
                    </div>
                    @if (Auth::check())
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="adtype" value="1" placeholder="1 for feature ad" >
                        <input type="hidden" name="price" value="15000" >
                        <input type="hidden" name="package_name" value="Diamond">
                        <input type="hidden" name="days" value="30">
                        <input target="_blank" type="submit" class="btn btn-success btn-lg btn-block mt-3" value="Buy Now" />
                    </form>
                    @else
                    <a target="_blank" href="{{ route('login') }}"  class="btn btn-success btn-lg btn-block mt-3"><span>Buy Now</span></a>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card mx-auto">
                <div class="card-body">
                    <div class="logo mb-1"><img src="{{ asset('assets/images/frontendimages/logo.png') }}" height="100" width="100" /></div>
                    <h3 class="card-title">Gold <small>(15 days Bi-Monthly)</small></h3>
                    <h6 class="card-subtitle  text-muted">7500/- PKR</h6>
                    <div class="row rone ">
                        <div class="col-md-12">
                            <ul>
                                <li>Appear under Feature Ads on homepage.</li>
                                <li>Amongst the top of searched results.</li>
                                <li>More chances to be noticed seen and clicked by the customer</li>
                            </ul>
                        </div>
                    </div>
                    @if (Auth::check())
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="adtype" value="1" placeholder="1 for feature ad" >
                        <input type="hidden" name="price" value="7500" >
                        <input type="hidden" name="package_name" value="Bronze">
                        <input type="hidden" name="days" value="15">
                        <input target="_blank" type="submit" class="btn btn-success btn-lg btn-block mt-3" value="Buy Now" />
                    </form>
                    @else
                    <a target="_blank" href="{{ route('login') }}"  class="btn btn-success btn-lg btn-block mt-3"><span>Buy Now</span></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card mx-auto">
                <div class="card-body">
                    <div class="logo mb-1"><img src="{{ asset('assets/images/frontendimages/logo.png') }}" height="100" width="100" /></div>
                    <h3 class="card-title">Silver <small>(7 days Weekly)</small></h3>
                    <h6 class="card-subtitle  text-muted">3500/- PKR</h6>
                    <div class="row rone ">
                        <div class="col-md-12">
                            <ul>
                                <li>Appear under Feature Ads on homepage.</li>
                                <li>Amongst the top of searched results.</li>
                                <li>More chances to be noticed seen and clicked by the customer</li>
                            </ul>
                        </div>
                    </div>
                    @if (Auth::check())
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="adtype" value="1" placeholder="1 for feature ad" >
                        <input type="hidden" name="price" value="3500" >
                        <input type="hidden" name="package_name" value="Silver">
                        <input type="hidden" name="days" value="7">
                        <input target="_blank" type="submit" class="btn btn-success btn-lg btn-block mt-3" value="Buy Now" />
                    </form>
                    @else
                    <a target="_blank" href="{{ route('login') }}"  class="btn btn-success btn-lg btn-block mt-3"><span>Buy Now</span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-danger">Buzz In Town</h1>
    <small>If your restaurant is new in town or have new deals to let the town know, buy this package. It will be published on the BUZZ in town page letting the town know.</small>
    <div class="row" style="padding: 20px;">
        <div class="col-lg-4 col-sm-12">
            <div class="card mx-auto">
                <div class="card-body">
                    <div class="logo mb-1"><img src="{{ asset('assets/images/frontendimages/logo.png') }}" height="100" width="100" /></div>
                    <h3 class="card-title">Diamond (30 days)</h3>
                    <h6 class="card-subtitle  text-muted">30000/- PKR</h6>
                    <div class="row rone ">
                        <div class="col-md-12">
                        <ul>
                            <li>Feature on “Buzz in town” page.</li>
                            <li>More chances to be noticed by the customer.</li>
                        </ul>
                        </div>
                    </div>
                    @if (Auth::check())
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="adtype" value="2" placeholder="1 for feature ad" >
                        <input type="hidden" name="price" value="30000" >
                        <input type="hidden" name="package_name" value="Diamond">
                        <input type="hidden" name="days" value="30">
                        <input target="_blank" type="submit" class="btn btn-success btn-lg btn-block mt-3" value="Buy Now" />
                    </form>
                    @else
                    <a target="_blank" href="{{ route('login') }}"  class="btn btn-success btn-lg btn-block mt-3"><span>Buy Now</span></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card mx-auto">
                <div class="card-body">
                    <div class="logo mb-1"><img src="{{ asset('assets/images/frontendimages/logo.png') }}" height="100" width="100" /></div>
                    <h3 class="card-title">Gold <small>(15 days)</small> </h3>
                    <h6 class="card-subtitle  text-muted">15000/- PKR</h6>
                    <div class="row rone ">
                        <div class="col-md-12">
                            <ul>
                                <li>Feature on “Buzz in town” page.</li>
                                <li>More chances to be noticed by the customer.</li>
                            </ul>
                        </div>
                    </div>
                    @if (Auth::check())
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="adtype" value="2" placeholder="1 for feature ad" >
                        <input type="hidden" name="price" value="15000" >
                        <input type="hidden" name="package_name" value="Bronze">
                        <input type="hidden" name="days" value="15">
                        <input target="_blank" type="submit" class="btn btn-success btn-lg btn-block mt-3" value="Buy Now" />
                    </form>
                    @else
                    <a target="_blank" href="{{ route('login') }}"  class="btn btn-success btn-lg btn-block mt-3"><span>Buy Now</span></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="card mx-auto">
                <div class="card-body">
                    <div class="logo mb-1"><img src="{{ asset('assets/images/frontendimages/logo.png') }}" height="100" width="100" /></div>
                    <h3 class="card-title">Silver <small>(weekly)</small> </h3>
                    <h6 class="card-subtitle  text-muted">7000/- PKR</h6>
                    <div class="row rone ">
                        <div class="col-md-12">
                            <ul>
                                <li>Feature on “Buzz in town” page.</li>
                                <li>More chances to be noticed by the customer.</li>
                            </ul>
                        </div>
                    </div>
                    @if (Auth::check())
                    <form action="{{ route('checkout') }}" method="post">
                        @csrf
                        <input type="hidden" name="adtype" value="2" placeholder="1 for feature ad" >
                        <input type="hidden" name="price" value="7000" >
                        <input type="hidden" name="package_name" value="Silver">
                        <input type="hidden" name="days" value="7">
                        <input target="_blank" type="submit" class="btn btn-success btn-lg btn-block mt-3" value="Buy Now" />
                    </form>
                    @else
                    <a target="_blank" href="{{ route('login') }}"  class="btn btn-success btn-lg btn-block mt-3"><span>Buy Now</span></a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <h1 class="text-danger">Banners Ads</h1>
    <small>1.	Wants to advertise your product on top and side banners which will appear on all the searched pages? contact 03325628860.

    </small>
    <div class="row" style="padding: 20px;">
        <div class="col-lg-12 col-sm-12">
            <div class="card mx-auto">
                <div class="card-body">
                    <div class="logo mb-1"><img src="{{ asset('assets/images/frontendimages/logo.png') }}" height="100" width="100" /></div>
                    <h3 class="card-title">Top Banner Ad</h3>
                    <div class="row rone ">
                        <div class="col-md-12">
                            <img src="{{ asset('images/bannertop.png') }}" style="height: 200px;width:100%;" alt="" />
                        </div>
                    </div>
                    <a target="_blank" href=""  class="btn btn-success btn-lg btn-block mt-3"><span>Buy now</span></a>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-sm-12">
            <div class="card mx-auto">
                <div class="card-body">
                    <div class="logo mb-1"></div>
                    <h3 class="card-title">Side Banner Ad</h3>
                    <div class="row rone ">
                        <div class="col-md-12">
                            <img src="{{ asset('images/adside.png') }}" style="height: 300px;width:100%;" alt="">
                        </div>
                    </div>
                    <a target="_blank" href=""  class="btn btn-success btn-lg btn-block mt-3"><span>Buy now</span></a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
