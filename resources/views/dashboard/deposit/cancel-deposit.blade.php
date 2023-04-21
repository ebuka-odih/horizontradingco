@extends('dashboard.layout.app')
@section('content')


    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="buysell wide-xs m-auto">

                    <div class="buysell-block">
                        <div class="modal-content">
                            {{--                            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>--}}
                            <div class="modal-body modal-body-lg">
                                <div class="nk-block-head nk-block-head-xs text-center">
                                    <em class="icon icon-circle icon-circle-xxl ni ni-cross bg-danger"></em>
                                    <h4 class="title">Opps, payment cancelled!</h4>

                                    <div class="nk-block-text">
                                        <p class="caption-text">You have cancelled your payment. Don't worry, you can make payment any time to deposit your account.</p>
                                        <p class="sub-text">Transaction ID {{ $deposit->transId() }}</p>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="nk-pps-action">
                                        <ul class="btn-group-vertical align-center gy-3">
                                            <li><a href="{{ route('user.deposit') }}" class="btn btn-lg btn-mw btn-primary">Deposit More</a></li>
                                            <li><a href="{{ route('user.dashboard') }}" class="link link-primary">Go back to Dashboard</a></li>
                                        </ul>
                                    </div>
                                    <div class="nk-pps-notes text-center">Please do not hesitate to <a href="{{ route('contact') }}">contact us</a> if you have any questions.</div>

                                </div><!-- .nk-block -->
                            </div><!-- .modal-body -->
                        </div>
                    </div><!-- .buysell-block -->
                </div><!-- .buysell -->
            </div>
        </div>
    </div>

@endsection
