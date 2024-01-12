@extends('frontend.master')
@section('content')
<style>

.msg-form {
    background-color: white;
    padding: 20px
}

.pad-icon {
    padding-top: 50px;
    padding-left: 20px
}

.pad-icon a {
    text-decoration: none;
    margin-right: 40px
}

.input-group input:focus {
    border: 1px solid blue
}

.pad-icon a:active {
    height: 30px;
    width: 30px;
    background-color: #0080ff;
    border-radius: 100%
}

.links {
    padding-top: 50px;
    width: 50%
}


</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<div class="container-fluid rounded" style="background:#010449;" >
    <div class="row px-5" style="padding: 20px;">
        <div class="col-sm-6">
            <div>
                <h3 class="text-white">Contact Us</h3>
                <p class="text-secondary">Fill up the form and our Team will get back to you within in 24 hours</p>
            </div>
            <div class="links" id="bordering">
                 <a href="#" class="btn rounded text-white" style="font-size: 20px;width: 200px;">
                     <i class="fa fa-phone icon text-white pr-3"></i> <br>
                     +92 332 5628860
                </a>
                <a href="#" class="btn rounded text-white p-3" style="font-size: 20px;">
                    <i class="fa fa-envelope icon text-white pr-3"></i>
                    support@foodhutti.com
                </a>
              <!-- <a href="#" class="btn rounded text-white p-3" style="font-size: 20px;">
                    <i class="fa fa-map-marker icon text-white pr-3"></i>
                    102 street 2714 Don
                </a>-->
            </div>
            <div class="pt-lg-4 d-flex flex-row justify-content-start">
                <div class="pad-icon"> <a class="fa fa-facebook text-white" href="#"></a> </div>
                <div class="pad-icon"> <a class="fa fa-twitter text-white" href="#"></a> </div>
                <div class="pad-icon"> <a class="fa fa-instagram text-white" href="#"></a> </div>
            </div>
        </div>
        <div class="col-sm-6 pad">
            <form class="rounded msg-form" action="{{ route('contactemail') }}" method="POST">
                @csrf
                <div class="form-group"> <label for="name" class="h6">Your Name</label>
                    <div class="input-group border rounded">
                        <div class="input-group-addon px-2 pt-1">
                            <p class="fa fa-user-o text-primary"></p>
                        </div> <input type="text" name="name" class="form-control border-0" required>
                    </div>
                </div>
                <div class="form-group"> <label for="name" class="h6">Email</label>
                    <div class="input-group border rounded">
                        <div class="input-group-addon px-2 pt-1"> <i class="fa fa-envelope text-primary"></i> </div> <input type="email" name="email" class="form-control border-0" required>
                    </div>
                </div>
                <div class="form-group"> <label for="msg" class="h6">Message</label> <textarea name="message" id="msgus" cols="10" rows="5" class="form-control bg-light" placeholder="Message" required></textarea> </div>
                <div class="form-group d-flex justify-content-end"> <input type="submit" class="btn btn-primary text-white" value="send message"> </div>
            </form>
        </div>
    </div>
</div>


@endsection
