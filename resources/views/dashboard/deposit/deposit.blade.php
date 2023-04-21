@extends('dashboard.layout.app')
@section('content')


<div class="nk-content nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-body">
            <div class="buysell wide-xs m-auto">
                <div class="buysell-title text-center">
                    <h2 class="title">Make A Deposit!</h2>
                    <em class="icon icon-circle icon-circle-xxl ni ni-wallet-saving bg-info"></em>
                </div><!-- .buysell-title -->
                <div class="buysell-block">
                    <form action="{{ route('user.processDeposit') }}" method="POST" class="buysell-form">
                        @csrf
                        @if(session()->has('declined'))
                            <div class="alert alert-danger">
                                {{ session()->get('declined') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="buysell-amount">Amount to Deposit</label>
                            </div>
                            <div class="form-control-group">
                                <input type="text" class="form-control form-control-lg form-control-number" id="buysell-amount" required name="amount" placeholder="100.00">
                                <div class="form-dropdown">
                                    <div class="text">USD</div>
                                </div>
                            </div>
                            <div class="form-note-group">
                                <span class="buysell-min form-note-alt">Minimum: 100.00 USD</span>
{{--                                <span class="buysell-rate form-note-alt">1 USD = 0.000016 BTC</span>--}}
                            </div>
                        </div><!-- .buysell-field -->
                        <div class="buysell-field form-group">
                            <div class="form-label-group">
                                <label class="form-label">Payment Method</label>
                            </div>
                            @foreach($payment_m as $item)
                            <div class="form-pm-group">
                                <ul class="buysell-pm-list">
                                    <li class="buysell-pm-item">
                                        <input class="buysell-pm-control" type="radio" value="{{ $item->id }}" required name="payment_method_id" id="{{ $item->id }}">
                                        <label class="buysell-pm-label" for="{{ $item->id }}">
                                            <span class="pm-name">{{ $item->name }}</span>
                                            <div class="nk-wgw-icon">
                                                <em class="icon ni ni-sign-btc"></em>
                                            </div>
{{--                                            <span class="pm-icon"><em class="icon ni ni-crypto"></em></span>--}}
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                        </div><!-- .buysell-field -->
                        <div class="buysell-field form-action">
                            <button class="btn btn-lg btn-block btn-primary" type="submit">Continue to Pay</button>
                        </div><!-- .buysell-field -->
                        <div class="form-note text-base text-center">Note: our transfer fee included, <a href="#">see our fees</a>.</div>
                    </form><!-- .buysell-form -->
                </div><!-- .buysell-block -->
            </div><!-- .buysell -->
        </div>
    </div>
</div>

@endsection
