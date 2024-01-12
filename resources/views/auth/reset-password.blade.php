<html>
    @include('frontend.layout.head')
    <body>
        @include('frontend.layout.header')
        <div class="container mt-5 py-5" style="background-color: #f8f9fa;">
           <div class="row mt-5">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="row">
                              <!-- Email Address -->
                            <div class="col-lg-12 col-sm-12">
                                <label for="email" >Email</label>

                                <input id="email" class="block mt-1 form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus />
                            </div>

                            <!-- Password -->
                            <div class="col-lg-12 col-sm-12 mt-4">
                                <label for="password" >Password</label>

                                <input id="password" class="block mt-1 form-control" type="password" name="password" required />
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-lg-12 col-sm-12  mt-4">
                                <label for="password_confirmation" >Confirm Password</label>

                                <input id="password_confirmation" class="block mt-1 form-control"
                                                    type="password"
                                                    name="password_confirmation" required />
                            </div>

                            <div  class="flex items-center justify-end col-lg-12 col-sm-12  mt-4">
                                <input style="color: white;" type="submit" class="btn btn-info form-control" value="Reset Password">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3"></div>
           </div>
        </div>

@include('frontend.layout.footer')


