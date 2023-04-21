@extends('dashboard.layout.app2')
@section('content')

<div class="nk-content nk-content-lg nk-content-fluid">
    <div class="container-xl wide-lg">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub"><a href="{{ route('user.plans') }}" class="back-to"><em class="icon ni ni-arrow-left"></em><span>Back to plan</span></a></div>
                        <div class="nk-block-head-content">
                            <h2 class="nk-block-title fw-normal">Ready to get started?</h2>
                        </div>
                    </div>
                </div><!-- nk-block-head -->
                <div class="nk-block invest-block">
                    <form action="{{ route('user.processInvest') }}" method="POST" class="invest-form">
                        @csrf
                        <input type="hidden" name="package_id" value="{{ $plan->id }}">
                        <div class="row g-gs">
                            <div class="col-lg-7">
                                <div class="invest-field form-group">
                                    <div class="form-label-group">
                                        <label class="form-label">Choose Quick Amount to Invest</label>
                                    </div>
                                    <div class="invest-amount-group g-2">
                                        <div class="invest-amount-item">
                                            <input type="radio" class="invest-amount-control" name="iv-amount" id="iv-amount-1">
                                            <label class="invest-amount-label" for="iv-amount-1">Min: $ @convert($plan->min_deposit)</label>
                                        </div>
                                        <div class="invest-amount-item">
                                            <input type="radio" class="invest-amount-control" name="iv-amount" id="iv-amount-2">
                                            <label class="invest-amount-label" for="iv-amount-2">Max: $ @convert($plan->max_deposit)</label>
                                        </div>

                                    </div>
                                </div><!-- .invest-field -->

                                <div class="invest-field form-group">

                                    <div class="buysell-field form-group mt-2">
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
                                        <div class="form-control-group">
                                            <input type="text" class="form-control form-control-lg form-control-number" id="buysell-amount" name="amount" placeholder="100">
                                            <div class="form-dropdown">
                                                <div class="text">USD</div>
                                            </div>

                                        </div>
                                        <div class="form-note-group">
                                            <span class="buysell-min form-note-alt">Account Balance $@convert(auth()->user()->balance)</span>
                                        </div>
                                    </div>

                                </div><!-- .invest-field -->

                            </div><!-- .col -->

                            <div class="col-xl-4 col-lg-5 offset-xl-1">
                                <div class="card card-bordered ml-lg-4 ml-xl-0">
                                    <div class="nk-iv-wg4">
                                        <div class="nk-iv-wg4-sub">
                                            <h6 class="nk-iv-wg4-title title">Plan Details</h6>
                                            <ul class="nk-iv-wg4-overview g-2">
                                                <li>
                                                    <div class="sub-text">Name of scheme</div>
                                                    <div class="lead-text">{{ $plan->name }}</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Term of the scheme</div>
                                                    <div class="lead-text">{{ $plan->term_days }} days</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Daily profit %</div>
                                                    <div class="lead-text"> {{ $plan->daily_interest }} %</div>
                                                </li>
                                                <li>
                                                    <div class="sub-text">Total Return</div>
                                                    <div class="lead-text"> {{ $plan->total_return() }}%</div>
                                                </li>

                                            </ul>
                                        </div><!-- .nk-iv-wg4-sub -->
                                        <div class="nk-iv-wg4-sub text-center bg-lighter">
                                            <button type="submit" class="btn btn-lg btn-primary ttu" >Confirm &amp; proceed</button>
                                        </div><!-- .nk-iv-wg4-sub -->
                                    </div><!-- .nk-iv-wg4 -->
                                </div><!-- .card -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </form>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>

@endsection
