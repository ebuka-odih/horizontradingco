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
                <h4 class="page-header">Deposit</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->



        <div class="row">
            <div class="col-lg-6 offset-lg-2">
                <div class="well">
                    <form action="{{ route('user.processDeposit') }}" method="POST">
                        @csrf
                        @if(session()->has('declined'))
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
                        <div class="form-col mb-3">
                            <label for="amount">Payment Method</label>
                            <select name="payment_wallet_id" id="" class="form-control">
                                @foreach($payment_wallet as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                       <div class="form-col mb-3">
                           <label for="amount">Amount</label>
                           <input type="text" name="amount" id="amount" class="form-control" required>
                       </div>
                        <br>
                        <input type="submit" value="Proceed" class="sbmt col-md-12">
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
