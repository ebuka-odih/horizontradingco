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
                                    <h5 class="nk-block-title">Confirm Order</h5>
                                    <i class="icon icon-circle icon-circle-xxl ni ni-wallet-saving bg-info"></i>

                                    <div class="nk-block-text">
                                        <div class="caption-text">You are about to get <strong>{{ $deposit->showBTCRate() }}</strong> BTC for <strong>@convert($deposit->amount)</strong> USD*</div>
                                        <span class="sub-text-sm">Exchange rate: 1 BTC = @convert($deposit->rate()) USD</span>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="buysell-overview">
                                        <ul class="buysell-overview-list">
                                            <li class="buysell-overview-item">
                                                <span class="pm-title">Pay with</span>
                                                <span class="pm-currency"><em class="icon ni ni-bitcoin"></em> <span>{{ $deposit->payment_method->name }}</span></span>
                                            </li>
                                            <li class="buysell-overview-item">
                                                <span class="pm-title">Total</span>
                                                <span class="pm-currency">@convert($deposit->amount) USD </span>
                                            </li>
                                        </ul>
                                        <div class="sub-text-sm">* Our transaction fee are included.</div>
                                    </div>
                                    <div class="buysell-field form-group">
                                        <div class="form-label-group">
                                            <label class="form-label">Copy the wallet address below for payment</label>
                                        </div>
                                        <div class="nk-refwg-url">
                                            <div class="form-control-wrap">
                                                <div class="form-clip clipboard-init" data-clipboard-target="#refUrl" data-success="Copied" data-text="Copy Link"><em class="clipboard-icon icon ni ni-copy"></em> <span class="clipboard-text">Copy Wallet</span></div>
                                                <div class="form-icon">
                                                    <em class="icon ni ni-link-alt"></em>
                                                </div>
                                                <input type="text" class="form-control copy-text" id="refUrl" value="{{ $deposit->payment_method->value }}">
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <div class="form-label-group">
                                            <label class="form-label text-center">Scan the QRcode below</label>
                                        </div>
                                        <div class="dropdown buysell-cc-dropdown">
                                            <div class="qr-media mx-auto mb-3 w-max-100px">
                                                {!! QrCode::size(450)->generate($deposit->payment_method->value); !!}

                                            </div>
                                        </div><!-- .dropdown -->
                                    </div><!-- .buysell-field -->
                                    <div class="buysell-field form-action text-center">
                                        <div>
                                            <a href="#" class="btn btn-primary btn-lg" data-dismiss="modal" data-toggle="modal" data-target="#confirm-coin">Confirm the Order</a>
                                        </div>
                                        <div class="pt-3">
                                            <a href="{{ route('user.cancelDeposit', $deposit->id) }}" data-dismiss="modal" class="link link-danger">Cancel Order</a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->
                            </div><!-- .modal-body -->
                        </div>

                    </div><!-- .buysell-block -->
                </div><!-- .buysell -->
            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="confirm-coin"  aria-modal="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg text-center">
                    <div class="nk-modal">
                        <div class="popup-content">
                            <h6 class="mb-2">Confirm your payment</h6>
                            <p>If you already paid, please provide us your payment reference to speed up verification procces.</p>
                            <form class="form" action="{{ route('user.processPayment') }}" method="POST" id="crypto-pay-reference">
                                @csrf
                                <input type="hidden" name="deposit_id" value="{{ $deposit->id }}">
                                <div class="form-group">
                                    <div class="form-label">Payment Reference <span class="text-danger">*</span></div>
                                    <div class="form-control-wrap">
                                        <input name="reference" type="text" class="form-control " required value="" placeholder="Enter your reference id / hash">
                                    </div>
                                </div>
                                <ul class="btn-group justify-between align-center gx-4">
                                    <li><button type="submit" class="btn btn-primary btn-block">Confirm Payment</button></li>
                                    <li>
                                        <a href="#" class="link link-btn link-secondary close" data-dismiss="modal">Close</a>

{{--                                        <a href="#" class="link link-btn link-secondary popup-close"></a>--}}
                                    </li>
                                </ul>

                            </form>
                            <div class="alert-note is-plain mt-4">
                                <em class="icon ni ni-alert-circle"></em>
                                <p>Account will credited once we confirm that payment has been received.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- .modal-body -->
                <div class="modal-footer bg-lighter">
                    <div class="text-center w-100">
                        <p>Earn upto $25 for each friend your refer! <a href="{{ route('user.all_referrals') }}">Invite friends</a></p>
                    </div>
                </div>
            </div><!-- .modal-content -->
        </div><!-- .modla-dialog -->
    </div>
@endsection
