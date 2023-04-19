@extends('dashboard.layouts.app')
@section('content')
    <style>
        .sbmt {
            background-color: #ffa800;
            border-color: #ffa800;
            padding: 10px;
            width: 40%;
            color: #fff;
        }
    </style>

    <div id="page-wrapper" style="border-color: rgb(255, 255, 255) !important; min-height: 562px;">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="page-header">Payment</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->



        <div class="row">
            <div class="col-lg-6 offset-lg-2">
                <div class="well">
                    <h3>Please confirm your deposit:</h3>
                    <p style="font-size: 16px">
                        Send your payments to our company Bitcoin Wallet Address. <br>
                        Send exact amount in <strong>{{ optional($deposit->payment_wallet)->name }}</strong>.
                        <br>
                        Amount: <strong>${{ $deposit->amount }}</strong>
                    </p>

                        <div class="">
                            {!! QrCode::size(200)->generate($deposit->payment_wallet->value ? : "no wallet"); !!}

                        </div>
                    <p style="margin-top: 25px">{{ optional($deposit->payment_wallet)->value ? : "No Wallet" }}</p>
                    <br>
                    <hr>
                    <form action="{{ route('user.processPayment') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        @if(session()->has('success'))
                            <div style="color: #1c3a1c" class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif @if(session()->has('declined'))
                            <div style="color: #943333" class="alert alert-danger">
                                {{ session()->get('declined') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="color: #943333">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <br>
                        <input type="hidden" name="deposit_id" value="{{ $deposit->id }}">
                        <label for="">Payment Screenshot</label>
                        <input type="file" name="payment_proof" placeholder="Enter transaction hash" class="form-control-file" value="{{ $deposit->payment_wallet->value }}">
                        <br>
                        <input type="submit" value="Send" class="sbmt col-md-12">
                    </form>
                    <br><br>
                </div>
            </div>
        </div>
    </div>

@endsection
