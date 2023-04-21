@extends('dashboard.layout.app2')
@section('content')


    <div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><span>My Plan</span></div>
                        <div class="nk-block-between-md g-4">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title fw-normal">Invested Schemes</h2>
                                <div class="nk-block-des">
                                    <p>Here is your current balance and your active investement plans.</p>
                                </div>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <ul class="nk-block-tools gx-3">
                                    <li><a href="{{ route('user.withdraw') }}" class="btn btn-primary"><span>Withdraw</span> <em class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></a></li>
                                    <li><a href="{{ route('user.plans') }}" class="btn btn-white btn-light"><span>Invest More</span> <em class="icon ni ni-arrow-long-right d-none d-sm-inline-block"></em></a></li>

                                </ul>
                            </div><!-- .nk-block-head-content -->
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="row gy-gs">
                                    <div class="col-lg-5">
                                        <div class="nk-iv-wg3">
                                            <div class="nk-iv-wg3-title">Total Balance</div>
                                            <div class="nk-iv-wg3-group  flex-lg-nowrap gx-4">
                                                <div class="nk-iv-wg3-sub">
                                                    <div class="nk-iv-wg3-amount">
                                                        <div class="number">@convert(auth()->user()->balance) <small class="currency currency-usd">USD</small></div>
                                                    </div>
                                                    <div class="nk-iv-wg3-subtitle">Available Balance</div>
                                                </div>
                                                <div class="nk-iv-wg3-sub">
                                                    <span class="nk-iv-wg3-plus text-soft"><em class="icon ni ni-plus"></em></span>
                                                    <div class="nk-iv-wg3-amount">
                                                        <div class="number-sm">@convert(auth()->user()->profit)</div>
                                                    </div>
                                                    <div class="nk-iv-wg3-subtitle">Locked Balance <em class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="" data-original-title="You can't use"></em></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                    <div class="col-lg-7">
                                        <div class="nk-iv-wg3">
                                            <div class="nk-iv-wg3-title"><em style="visibility: hidden" class="icon ni ni-info-fill" data-toggle="tooltip" data-placement="right" title="" ></em></div>
                                            <div class="nk-iv-wg3-group flex-md-nowrap g-4">

                                                <div class="nk-iv-wg3-sub flex-grow-1 ml-md-3">
                                                    <div class="nk-iv-wg3-ck"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                                        <canvas class="chart-profit chartjs-render-monitor" id="profitCM" style="display: block; width: 327px; height: 45px;" width="327" height="45"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- .col -->
                                </div><!-- .row -->
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head-sm">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Active Plan <span class="count text-base">(2)</span></h5>
                        </div>
                    </div>
                    <div class="nk-iv-scheme-list">
                       @foreach($investments as $item)
                        <div class="nk-iv-scheme-item">
                            <div class="nk-iv-scheme-icon is-running">
                                <em class="icon ni ni-update"></em>
                            </div>
                            <div class="nk-iv-scheme-info">
                                <div class="nk-iv-scheme-name">{{ $item->package->name }} - Daily {{ $item->package->daily_interest }}% for {{ $item->package->term_days }} Days</div>
                                <div class="nk-iv-scheme-desc">Invested Amount - <span class="amount">$@convert($item->amount)</span></div>
                            </div>
                            <div class="nk-iv-scheme-term">
                                <div class="nk-iv-scheme-start nk-iv-scheme-order">
                                    <span class="nk-iv-scheme-label text-soft">Start Date</span>
                                    <span class="nk-iv-scheme-value date">{{ date('M d, Y', strtotime($item->created)) }}</span>
                                </div>
                            </div>
                            <div class="nk-iv-scheme-end nk-iv-scheme-order">
                                <span class="nk-iv-scheme-label text-soft">End Date</span>
                                <span class="nk-iv-scheme-value date">{{ date('M d, Y', strtotime($item->ending_date())) }}</span>
                            </div>

                            <div class="nk-iv-scheme-amount">

                                <div class="nk-iv-scheme-amount-b nk-iv-scheme-order">
                                    <span class="nk-iv-scheme-label text-soft">Net Profit Earn</span>
                                    <span class="nk-iv-scheme-value amount">$ @convert($item->earning)</span>
                                </div>
                            </div>
                            <div class="nk-iv-scheme-more">
                                <a class="btn btn-icon btn-lg btn-round btn-trans" href="{{ route('user.investmentDetails', $item->id) }}"><em class="icon ni ni-forward-ios"></em></a>
                            </div>
                            <div class="nk-iv-scheme-progress">
                                <div class="progress-bar" data-progress="100" style="width: 90%;"></div>
                            </div>
                        </div><!-- .nk-iv-scheme-item -->
                        @endforeach
                    </div><!-- .nk-iv-scheme-list -->
                </div><!-- .nk-block -->

            </div>
        </div>
    </div>
</div>

@endsection
