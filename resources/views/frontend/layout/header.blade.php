<header class="u-clearfix u-header" id="sec-e47f">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a id="logoa" style="padding: 0px;margin: 0px;" href="#" class="navbar-brand">
                <img src="{{ asset('assets/images/frontendimages/logo.png') }}" height="70" alt="CoolBrand">
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse sidebar" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="{{ url('/') }}" style="font-size:20px;margin:auto;font-weight: 600;"  class="nav-item nav-link active">Home</a>
                    <a class="nav-item nav-link" style="font-size:20px;margin:auto;font-weight: 600;" href="{{ route('packages') }}" >Packages</a>
                    <a class="nav-item nav-link" style="font-size:20px;margin:auto;font-weight: 600;" href="{{ route ('buzzintown') }}" >Buzz in town</a>
                    <a class="nav-item nav-link" style="font-size:20px;margin:auto;font-weight: 600;" href="{{ route ('howitworks') }}">How it works</a>
                    <a class="nav-item nav-link" style="font-size:20px;margin:auto;font-weight: 600;" href="{{ url('Contact') }}">Contact</a>
                </div>
                <div class="navbar-nav ms-auto">
                    @if (Auth::user())
                    <a  href="{{ route('dashboard') }}" class="nav-item nav-link" style="font-size:20px;margin:auto;font-weight: 600;">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="navbar-nav" style="display: contents;">
                            @csrf
                            <a class="nav-item nav-link" style="font-size:20px;margin:auto;font-weight: 600;" onclick="event.preventDefault();
                            this.closest('form').submit();" href="{{ url('login') }}" class="mega-menu" title="Sign Out">
                                Logout
                            </a>
                        </form>
                    @else
                        <a id="signup" data-bs-toggle="modal" data-bs-target="#exampleModal1" href="#" class="nav-item nav-link" style="font-size:20px;margin:auto;font-weight: 600;">Signup</a>
                        <a id="login" data-bs-toggle="modal" data-bs-target="#exampleModal2" href="#" class="nav-item nav-link" style="font-size:20px;margin:auto;font-weight: 600;">Login</a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
</header>
@if (count($errors) != 0)
<div class="alert alert-danger">
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Create An Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control search-slt" placeholder="Enter Name" required>
                            </div>
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input type="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" name="email" id="email" class="form-control search-slt" placeholder="Enter Email" required>
                            </div>
                            <div class="col-12">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control search-slt" placeholder="" required>
                            </div>
                            <div class="col-12">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="cpassword" class="form-control search-slt" placeholder="" required>
                            </div>
                            <div class="col-12">
                                <input type="submit" class="form-control btn btn-danger mt-2"  value="Signup">
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control search-slt" placeholder="Enter Email" required>
                            </div>
                            <div class="col-12">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control search-slt" placeholder="" required>
                            </div>
                            <div class="col-12">
                                <input type="submit" class="form-control btn btn-danger mt-2"  value="Login">
                            </div>
                            <div class="col-12">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal3" class="text-center mt-3 text-decoration-none">Forgot Password?</a>
                            </div>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen-lg-down">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Password Reset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">

                <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="col-12">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control search-slt" placeholder="Enter Email" required>
                        </div>       <!-- Email Address -->
                        <div class="col-12">
                            <input type="submit" class="form-control btn btn-danger mt-2"  value="Send Reset Link">
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </div>
</div>

