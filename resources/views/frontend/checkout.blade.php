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
    <h1 class="text-danger">Payment Invoice</h1>
    <small>Deposit fee in any of the given banks and attach the invoice below.</small>
    <div class="row" style="padding: 20px;">
        <div class="col-lg-12 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <tr>
                            <th>Package Name</th>
                            <td>{{ $packagedata->package_name }}</td>
                            <th>Package Type</th>
                            <td>
                                @if ($packagedata->adtype == 1)
                                    <span class="badge bg-danger">Feature Restaurant</span>
                                @endif
                                @if ($packagedata->adtype == 2)
                                    <span class="badge bg-success">Buzz In Town</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td  style="font-size: 20px;font-weight: 600;">PKR {{ $packagedata->price }} /-</td>
                            <th>Total Days</th>
                            <td style="font-size: 20px;font-weight: 600;">{{ $packagedata->days }}</td>
                        </tr>
                    </table>
                </div>
                <br><br>
                @php
                    $ownerrest = App\Models\restaurant::where('user_id',Auth::user()->id)->first();
                @endphp
                <div class="col-6">
                    <div class="alert alert-success">
                        {{ $message ?? '' }}
                    </div>
                    <h3 class="pt-5">Upload Payment Receipt</h3>
                    <form class="pb-5 pl-3" action="{{ route('purchasePackage') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="adtype" value="{{ $packagedata->adtype }}" placeholder="1 for feature ad" >
                        <input type="hidden" name="price" value="{{ $packagedata->price }}" >
                        <input type="hidden" name="package_name" value="{{ $packagedata->package_name }}">
                        <input type="hidden" name="days" value="{{ $packagedata->days }}">
                        <input type="hidden" name="restaurant_id" value="{{ $ownerrest->id }}">
                        <label for="">Upload Payment Receipt, Upload Screenshot in case of Digital Payment( Online Payment, Jazz cash, Easy paisa etc)</label><br>
                        <input type="file" name="file_name" class="form-control" required>
                        @if ($packagedata->adtype == 2)
                        <div class="py-4">
                            <input type="radio" name="rest" value="rest" required>&nbsp;&nbsp;&nbsp;I want my restaurant to show under buzz in town tab <br>
                            <input type="radio" name="rest" value="post" required>&nbsp;&nbsp;&nbsp;I want my deal to show under buzz in town tab <br>
                        </div>
                        <div id="optional" style="display: none;">
                            <label for="">Upload Your Deal Post</label><br>
                            <small>upload post,menu etc you want to display in buzz in town app</small>
                            <input type="file" name="buzzintownmenu" class="form-control" >
                        </div>

                        @endif
                        <input type="submit" class="mt-2 form-control text-white btn btn-info" value="Submit" >
                    </form>
                </div>
                <div class="col-6"></div>
                <h1>Bank Details</h1>
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <h3>Bank Alfalah</h3>
                        <table class="table">
                            <tr>
                                <th>Account</th>
                                <td>01011003686436 </td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>Saad Anis</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <h3>MCB</h3>
                        <table class="table">
                            <tr>
                                <th>Account</th>
                                <td>0867119501001679</td>
                            </tr>
                            <tr>
                                <th>IBAN</th>
                                <td>PK95MUCB0867119501001679</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>Saad Anis</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <h3>Standard Chartered Bank</h3>
                        <table class="table">
                            <tr>
                                <th>Account</th>
                                <td>01732601401</td>
                            </tr>
                            <tr>
                                <th>IBAN</th>
                                <td>PK40SCBL0000001732601401</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>Saad Anis</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <h3>Mobilink/Jazz Cash</h3>
                        <table class="table">
                            <tr>
                                <th>Account</th>
                                <td>03045209440</td>
                            </tr>
                            <tr>
                                <th>Title</th>
                                <td>Saad Anis</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $('input[type=radio][name=rest]').on('change', function() {
  switch ($(this).val()) {
    case 'rest':
    $("#optional").hide();
      break;
    case 'post':
      $("#optional").show();
      break;
  }
});
</script>
@endsection
