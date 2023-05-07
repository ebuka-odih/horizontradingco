@extends('admin.layout.app')
@section('content')


    <main id="main-container">

        <!-- Hero -->
        <div class="content">
            <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                <div>
                    <h1 class="h3 mb-1">
                         Investment Detail
                    </h1>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <div class="block-content block-content-full">

                        @if( $deposit_detail->status == 1)
                            <table cellspacing=1 cellpadding=2 border=0 width=100%  class="table">
                                <tr style="margin-bottom: 10px;">
                                    <th colspan="3" class=inheader><b>INVESTMENT DETAILS</b></th>
                                </tr>
                                <tr>
                                    <th>PLAN:</th>
                                    <td colspan="2">{{ optional($deposit_detail->package)->name }}</td>
                                </tr>
                                <tr>
                                    <th>INVESTED AMOUNT:</th>
                                    <td colspan="2">&#163;{{ $deposit_detail->amount }} @if($deposit_detail->amount * 5 == 500) [5x] -> (&#163;500) @else [10x] -> (&#163;1000) @endif</td>
                                </tr>

                                <tr>
                                <tr>
                                    <th>ROI:</th>
                                    <td colspan="2">&#163;@convert($deposit_detail->expected_profit())</td>
                                </tr>
                                <tr>
                                    <th>TOTAL RETURN (WITH CAPITAL):</th>
                                    <td colspan="2">&#163;@convert($deposit_detail->expected_profit() + $deposit_detail->amount)</td>
                                </tr>
                                <tr>
                                    <th>INTERVAL:</th>
                                    <td colspan="2">{{ optional($deposit_detail->package)->term_days }} Days</td>
                                </tr>
                                <tr>
                                    <th>DAILY PROFIT:</th>
                                    <td colspan="2">{{ optional($deposit_detail->package)->daily_interest }}(%)</td>
                                </tr>
                                <tr>
                                    <th>TOTAL PROFIT (%):</th>
                                    <td colspan="2">{{ optional($deposit_detail->package)->total_return() }}(%)</td>
                                </tr>
                                <tr>
                                    <th>START DATE:</th>
                                    <td colspan="2">{{ date('d-M-y', strtotime($deposit_detail->approved_date)) }}</td>
                                </tr>
                                <tr>
                                    <th>ENDING DATE:</th>
                                    <td colspan="2">{{ date('d-M-y', strtotime($deposit_detail->ending_date())) }}</td>
                                </tr>
                                <tr>
                                    <th>TRANSACTION STATUS:</th>
                                    <td colspan="2">{!! $deposit_detail->status() !!}</td>
                                </tr>
                                <tr><td colspan=3>&nbsp;</td>
                                <tr>
                                    <th>PROFIT EARNED:</th>
                                    <td colspan="2">$ @convert($deposit_detail->earning) <span style="margin-left: 20px">(without capital)</span></td>
                                </tr>
                                <tr>
                                    <th>TOTAL EARNED:</th>
                                    <td colspan="2">&#163;@convert($deposit_detail->total_earned()) <span style="margin-left: 20px">(plus capital)</span></td>
                                </tr>
                                <tr>
                                    <th> PROGRESS :</th>

                                  <td colspan="2">{!! $deposit_detail->adminStatus() !!}</td>
                                </tr>
                                <tr>
                                    <td colspan=3>&nbsp;</td>
                                </tr>


                            </table>
                        @elseif($deposit_detail->status == 0)
                            <table cellspacing=1 cellpadding=2 border=0 width=100%  class="table">
                                <tr style="margin-bottom: 10px;">
                                    <th colspan="3" class=inheader><b>TRANSACTION DETAILS</b></th>
                                </tr>
                                <tr>
                                <tr>
                                    <th>CHOSEN PLAN:</th>
                                    <td colspan="2">{{ optional($deposit_detail->package)->name }}</td>
                                </tr>
                                <tr>
                                    <th>INVESTMENT AMOUNT:</th>
                                    <td colspan="2">&#163;{{ $deposit_detail->amount }} @if($deposit_detail->amount * 5 == 500) [5x] -> (&#163;500) @else [10x] -> (&#163;1000) @endif</td>
                                </tr>

                                <tr>

                                    <th>EXPECTED PROFIT:</th>
                                    <td colspan="2">&#163;{{ $deposit_detail->expected_profit() }}
                                        <span style="margin-left: 30px">(With Capital) &#163;@convert($deposit_detail->expected_profit() + $deposit_detail->amount)</span></td>
                                </tr>
                                <tr>
                                    <th>INVESTMENT INTERVAL:</th>
                                    <td colspan="2">{{ optional($deposit_detail->package)->term_days }} Days</td>
                                </tr>
                                <tr>
                                    <th>INVESTMENT DAILY PROFIT:</th>
                                    <td colspan="2">{{ optional($deposit_detail->package)->daily_interest }}(%)</td>
                                </tr>
                                <tr>
                                    <th>INVESTMENT TOTAL PROFIT:</th>
                                    <td colspan="2">{{ $deposit_detail->total_return() }}(%)</td>
                                </tr>
                                <tr>
                                    <th>TRANSACTION STATUS:</th>
                                    <td colspan="2">{!! $deposit_detail->status() !!}</td>
                                </tr>
                                <tr><td colspan=3>&nbsp;</td>
                                </tr>
                                <tr style="margin-bottom: 10px;">
                                    <th colspan="3" class=inheader><b>MAKE PAYMENT</b></th>
                                </tr>
                                <tr>
                                    <th>SEND TO <br>BITCOIN PAYMENT:</th>
                                    <td colspan="2"><input style="width: 300px; height: 20px" id="btc" value="{{ setting('wallet_id') ? : 'No Wallet ID' }}">

                                        <!-- Trigger -->
                                        <a href=""  class="btn" data-clipboard-target="#btc">
                                            <img height="20" width="20" src="{{ asset('images/clippy.svg') }}" alt="Copy to clipboard">
                                        </a></td>
                                </tr>
                                <tr>
                                    <th>SCAN BARCODE<br>BITCOIN PAYMENT:</th>
                                    <td colspan="2"><img height="250" width="250" src="{{ asset('images/btc2.png') }}" alt="Bitcoin Barcode"> </td>
                                </tr>
                                <tr>
                                    <td colspan=3>&nbsp;
                                        @if ($errors->any())
                                            <div style="margin-bottom: 5px" class="container">
                                                <div class="alert-message">
                                                    <span><strong style="color: white">Some Errors Prevented Your Form From Submitting</strong></span>
                                                    @foreach ($errors->all() as $error)
                                                        <li style="color: lightcoral">{{ $error }}</li>
                                                    @endforeach
                                                </div>
                                        @endif
                                    </td>
                                </tr>
                                <tr style="margin-bottom: 10px;">
                                    <th colspan="3" class=inheader><b>PAYMENT PROOF </b></th>
                                </tr>
                                @if(Session::has('success_message'))
                                    <tr>
                                        <th>PAYMENT PROOF:</th>
                                        <td colspan="2">Proof of Payment awaiting confirmation, If you made a mistake refresh the page then submit again</td>
                                    </tr>
                                    <tr>
                                        <th>PAYMENT PROOF:</th>
                                        <td colspan="2">
                                            <img id="myImg" height="300" width="300" src="/storage/payment-proof/{{ $deposit_detail->payment_proof }}" alt="Payment Proof">
                                        </td>
                                    </tr>
                                @else
                                    <tr>
                                        <th>UPLOAD<br>PAYMENT PROOF:</th>
                                        <td colspan="2">
                                            <form method="POST" action="{{ route('user.payment_proof') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input required name="payment_proof_id" value="{{ $deposit_detail->id }}" style="width: 380px; max-width: 100%;" type="hidden">
                                                <input required name="payment_proof" style="width: 380px; max-width: 100%;" accept=".jpg, .png, .jpeg" type="file">
                                                @error('payment_proof')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                                <button style="width: 50px; margin-top: 18px" type="submit" class="btn btn-success">Upload Transaction Proof</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <td>
                                    <th colspan="2"></th>
                                    </th>
                                    <tr>
                                        <th colspan="1"></th>
                                        <td colspan="2"><a href="{{ route('user.history') }}" class="btn btn-success">Done</a> </td>
                                    </tr>
                                @endif


                            </table>
                        @else
                            <h1 style="color: red">Transaction Declined</h1>
                        @endif

                    </div>
                </div>
            </div>
            <!-- END Page Content -->
    </main>

@endsection
