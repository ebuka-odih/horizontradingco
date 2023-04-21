@extends('dashboard.layout.app2')
@section('content')


    <div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a href="{{ route('user.investments') }}" class="text-soft back-to"><em class="icon ni ni-arrow-left"> </em><span>My Investment</span></a></div>
                        <div class="nk-block-between-md g-4">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title fw-normal">{{ $deposit_detail->package->name }} - Daily {{ $deposit_detail->package->daily_interest }}% for {{ $deposit_detail->package->term_days }} Days</h2>
                                <div class="nk-block-des">
                                    <p> <span class="badge badge-outline badge-primary">Running</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            <div class="row gy-gs">
                                <div class="col-md-6">
                                    <div class="nk-iv-wg3">
                                        <div class="nk-iv-wg3-group flex-lg-nowrap gx-4">
                                            <div class="nk-iv-wg3-sub">
                                                <div class="nk-iv-wg3-amount">
                                                    <div class="number">$@convert($deposit_detail->amount)</div>
                                                </div>
                                                <div class="nk-iv-wg3-subtitle">Invested Amount</div>
                                            </div>
                                            <div class="nk-iv-wg3-sub">
                                                <span class="nk-iv-wg3-plus text-soft"><em class="icon ni ni-plus"></em></span>
                                                <div class="nk-iv-wg3-amount">
                                                    <div class="number">$@convert($deposit_detail->earning) </div>
                                                </div>
                                                <div class="nk-iv-wg3-subtitle">Profit Earned</div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .col -->
                                <div class="col-md-6 col-lg-4 offset-lg-2">
                                    <div class="nk-iv-wg3 pl-md-3">
                                        <div class="nk-iv-wg3-group flex-lg-nowrap gx-4">
                                            <div class="nk-iv-wg3-sub">
                                                <div class="nk-iv-wg3-amount">
                                                    <div class="number">$@convert($deposit_detail->total_earned)
                                                    </div>
                                                </div>
                                                <div class="nk-iv-wg3-subtitle">Total Return</div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div>
                        <div id="schemeDetails" class="nk-iv-scheme-details">
                            <ul class="nk-iv-wg3-list">
                                <li>
                                    <div class="sub-text">Term</div>
                                    <div class="lead-text">{{ $deposit_detail->package->term_days }} Days</div>
                                </li>
                                <li>
                                    <div class="sub-text">Term start at</div>
                                    <div class="lead-text">{{ date('M d, Y h:i A', strtotime($deposit_detail->created_at)) }}</div>
                                </li>
                                <li>
                                    <div class="sub-text">Term end at</div>
                                    <div class="lead-text">{{ date('M d, Y h:i A', strtotime($deposit_detail->ending_date())) }}</div>
                                </li>
                                <li>
                                    <div class="sub-text">Daily interest</div>
                                    <div class="lead-text">{{ $deposit_detail->package->daily_interest }}%</div>
                                </li>
                            </ul><!-- .nk-iv-wg3-list -->
                            <ul class="nk-iv-wg3-list">
                                <li>
                                    <div class="sub-text">Ordered date</div>
                                    <div class="lead-text">{{ date('M d, Y h:i A', strtotime($deposit_detail->created_at)) }}</div>
                                </li>
                                <li>
                                    <div class="sub-text">Approved date</div>
                                    <div class="lead-text">{{ date('M d, Y h:i A', strtotime($deposit_detail->created_at)) }}</div>
                                </li>
                                <li>
                                    <div class="sub-text">Payment method</div>
                                    <div class="lead-text">Internal Deposit</div>
                                </li>
                                <li>
                                    <div class="sub-text">Paid <small>(fee include)</small></div>
                                    <div class="lead-text"><span class="currency currency-usd">USD</span> @convert($deposit_detail->amount)</div>
                                </li>
                            </ul><!-- .nk-iv-wg3-list -->
                            <ul class="nk-iv-wg3-list">
                                <li>
                                    <div class="sub-text">Captial invested</div>
                                    <div class="lead-text"><span class="currency currency-usd">USD</span> @convert($deposit_detail->amount)</div>
                                </li>
                                <li>
                                    <div class="sub-text">Daily profit</div>
                                    <div class="lead-text"><span class="currency currency-usd">USD</span> @convert($deposit_detail->daily())</div>
                                </li>
                                <li>
                                    <div class="sub-text">Net profit</div>
                                    <div class="lead-text"><span class="currency currency-usd">USD</span> @convert($deposit_detail->earning)</div>
                                </li>
                                <li>
                                    <div class="sub-text">Total return</div>
                                    <div class="lead-text"><span class="currency currency-usd">USD</span> @convert($deposit_detail->total_earned)</div>
                                </li>
                            </ul><!-- .nk-iv-wg3-list -->
                        </div><!-- .nk-iv-scheme-details -->
                    </div>
                </div><!-- .nk-block -->

            </div>
        </div>
    </div>
</div>

@endsection
