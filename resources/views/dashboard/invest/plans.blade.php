@extends('dashboard.layout.app2')
@section('content')

<div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head text-center">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><span>Choose an Option</span></div>
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Investment Plan</h2>
                            <div class="nk-block-des">
                                <p>Choose your investment plan and start earning.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- nk-block -->
                <div class="nk-block">
                    <form action="{{ route('user.processInvest') }}" method="POST" class="plan-iv">
                    @csrf

                        <div class="plan-iv-list nk-slider nk-slider-s2">
                            <ul class="plan-list slider-init" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite":false, "responsive":[
						{"breakpoint": 992,"settings":{"slidesToShow": 2}},
						{"breakpoint": 768,"settings":{"slidesToShow": 1}}
					]}'>
                                @foreach($plans as $item)
                                    <li class="plan-item">
                                        <input type="radio" id="{{ $item->id }}" name="package_id" value="{{ $item->id }}" class="plan-control" required>
                                        <div class="plan-item-card">
                                            <div class="plan-item-head">
                                                <div class="plan-item-heading">
                                                    <h4 class="plan-item-title card-title title">{{ $item->name }}</h4>
                                                    <p class="sub-text">Enjoy entry level of invest & earn money.</p>
                                                </div>
                                                <div class="plan-item-summary card-text">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <span class="lead-text">{{ $item->daily_interest }}%</span>
                                                            <span class="sub-text">Daily Interest</span>
                                                        </div>
                                                        <div class="col-6">
                                                            <span class="lead-text">{{ $item->term_days }}</span>
                                                            <span class="sub-text">Term Days</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="plan-item-body">
                                                <div class="plan-item-desc card-text">
                                                    <ul class="plan-item-desc-list">
                                                        <li><span class="desc-label">Min Deposit</span> - <span class="desc-data">$@convert($item->min_deposit)</span></li>
                                                        <li><span class="desc-label">Max Deposit</span> - <span class="desc-data">${{ $item->max_deposit() }}</span></li>
                                                        <li><span class="desc-label">Deposit Return</span> - <span class="desc-data">Yes</span></li>
                                                        <li><span class="desc-label">Total Return</span> - <span class="desc-data">{{ $item->total_return() }}%</span></li>
                                                    </ul>
                                                    <div class="plan-item-action">
                                                        <label for="{{ $item->id }}" class="plan-label">
                                                            <span class="plan-label-base">Choose this plan</span>
                                                            <span class="plan-label-selected">Plan Selected</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li><!-- .plan-item -->
                                @endforeach

                            </ul><!-- .plan-list -->


                            <div class="buysell-field form-group mt-2 col-lg-6 col-md-6 offset-lg-3 offset-md-3">
                                <div class="form-label-group">
                                    <label class="form-label text-center" for="buysell-amount">Enter Amount to Invest</label>
                                </div>
                                <div class="nk-block-des">
                                    <p class="text-danger">Note: This will be deducted from your main balance</p>
                                </div>
                                <br>
                                @if(session()->has('declined'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('declined') }}
                                    </div>
                                @endif
                                @if(session()->has('insufficient'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('insufficient') }}
                                    </div>
                                @endif
                                @if(session()->has('wallet'))
                                    <div class="alert alert-danger">
                                        {{ session()->get('wallet') }}
                                    </div>
                                @endif
                                <div class="form-control-group ">
                                    <label for="">
                                        <input type="radio" name="balance" value="btc_balance">
                                        Spend funds from Bitcoin ($@convert(auth()->user()->btc_balance))
                                    </label>
                                    <br>
                                    <label for="">
                                        <input type="radio" name="balance" value="eth_balance">
                                        Spend funds from Ethereum ($@convert(auth()->user()->eth_balance))
                                    </label><br>
                                    <label for="">
                                        <input type="radio" name="balance" value="usdt_balance">
                                        Spend funds from USDT ($@convert(auth()->user()->usdt_balance))
                                    </label><br>
                                    <label for="">
                                        <input type="radio" name="balance" value="doge_balance">
                                        Spend funds from Doge ($@convert(auth()->user()->doge_balance))
                                    </label>

                                </div>

                                <div class="form-control-group ">
                                    <input type="text" class="form-control form-control-lg form-control-number" id="buysell-amount" name="amount" placeholder="100">
                                    <div class="form-dropdown">
                                        <div class="text">USD</div>
                                    </div>

                                </div>
                                <div class="form-note-group">
                                    <span class="buysell-min form-note-alt">Account Balance $@convert(auth()->user()->balance)</span>
                                </div>
                            </div>



                        </div>

                        <div class="plan-iv-actions text-center">
                            <button type="submit" class="btn btn-primary btn-lg"> <span>Continue to Invest</span> <em class="icon ni ni-arrow-right"></em></button>
                        </div>
                    </form>
                </div><!-- nk-block -->
            </div>
        </div>
    </div>
</div>

@endsection
