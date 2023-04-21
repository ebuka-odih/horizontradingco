@extends('dashboard.layout.app')
@section('content')


    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="buysell wide-xs m-auto">
                    <div class="buysell-title text-center">
                        {{--                        <h2 class="title">Make A Deposit!</h2>--}}
                        {{--                        <em class="icon icon-circle icon-circle-xxl ni ni-wallet-saving bg-info"></em>--}}
                    </div><!-- .buysell-title -->
                    <div class="buysell-block">
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <div class="modal-content">
                            {{--                            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>--}}
                            <div class="modal-body modal-body-lg">
                                <div class="nk-block-head nk-block-head-xs text-center">
                                    <h5 class="nk-block-title">Insufficient Fund</h5>
                                    <i class="icon icon-circle icon-circle-xxl ni ni-wallet-saving bg-info"></i>


                                    <div class="nk-block-text">
                                        <p class="caption-text">You do not have any funds in your account to withdraw. Try again, once funds available.</p>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="buysell-overview">
                                        <div class="sub-text-sm">* Our transaction fee are included.</div>
                                    </div>
                                    <div class="nk-pps-action">
                                        <ul class="btn-group-vertical align-center gy-3">
                                            <li><a href="{{ route('user.dashboard') }}" class="btn btn-lg btn-mw btn-primary">Go to Dashboard</a></li>
                                        </ul>
                                    </div>

                                    <div class="nk-pps-notes text-center">
                                        Please feel free to contact us if you face any problem.
                                    </div>

                                </div><!-- .nk-block -->
                            </div><!-- .modal-body -->
                        </div>

                    </div><!-- .buysell-block -->
                </div><!-- .buysell -->
            </div>
        </div>
    </div>


@endsection
