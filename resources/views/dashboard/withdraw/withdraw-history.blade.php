@extends('dashboard.layout.app')
@section('content')

    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-between-md g-4">
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Your Withdrawal</h2>
                            <div class="nk-block-des">
                                <p>List of all pending/cancelled withdrawal</p>
                            </div>
                        </div>
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools gx-3">
                                <li class="order-md-last"><a href="{{ route('user.withdraw') }}" class="btn btn-primary"><span>Withdraw</span> <em class="icon ni ni-arrow-long-right"></em></a></li>
{{--                                <li><a href="#" class="btn btn-white btn-light"><em class="icon ni ni-money"></em><span><span class="d-none d-sm-inline-block">Invest /</span> Earn</span></a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <ul class="nk-nav nav nav-tabs">
                    <li class="nav-item active current-page">
                        <a class="nav-link" href="{{ route('user.transactions') }}">Deposits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.pendingTransactions') }}">Scheduled <span class="badge badge-primary">{{ $count }}</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('user.withdraw.transactions') }}">Withdrawal</a>
                    </li>

                </ul><!-- .nav-tabs -->
                <div class="nk-block nk-block-sm">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h6 class="nk-block-title">All Orders</h6>
                            </div>

                        </div>
                        <div class="search-wrap search-wrap-extend" data-search="search">
                            <div class="search-content">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                <input type="text" class="form-control form-control-sm border-transparent form-focus-none" placeholder="Quick search by user">
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                            </div>
                        </div><!-- .search-wrap -->
                    </div><!-- .nk-block-head -->

                    <div class="tranx-list tranx-list-stretch card card-bordered">
                        @forelse($withdraw as $item)
                            <div class="tranx-item">
                                <div class="tranx-col">
                                    <div class="tranx-info">
                                        <div class="tranx-badge">
                                            <span class="tranx-icon icon ni ni-sign-eth"></span>
                                        </div>
                                        <div class="tranx-data">
                                            <div class="tranx-label">{{ $item->withdraw_method->name  }} Withdrawal <span class="ml-3"> {!! $item->status() !!}</span></div>
                                            <div class="tranx-date">{{ date('M d, Y h:i A', strtotime($item->created_at)) }}</div>
                                            @if($item->status == 0)
                                                <a href="{{ route('user.cancelWithdraw', $item->id) }}"  class="link link-danger">Cancel</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="tranx-col">
                                    <div class="tranx-amount">
                                        <div class="number">{{ $item->showBTCRate() }} <span class="currency currency-btc">BTC</span></div>
                                        <div class="number-sm">@convert($item->amount) <span class="currency currency-usd">USD</span></div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="tranx-item">
                                <h5>No Transaction</h5>

                            </div>
                        @endforelse

                    </div><!-- .card -->
                    <div class="text-center pt-4">
                        <div class="d-flex justify-content-center">
                            {!! $withdraw->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
