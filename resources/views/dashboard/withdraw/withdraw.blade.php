@extends('dashboard.layout.app')
@section('content')


    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="buysell wide-xs m-auto">
                    <div class="buysell-title text-center">
                        <h2 class="title">Make A Withdrawal!</h2>
                        <em class="icon icon-circle icon-circle-xxl ni ni-wallet-saving bg-info"></em>
                    </div><!-- .buysell-title -->
                    <div class="buysell-block">
                        <form action="{{ route('user.processWithdraw') }}" method="POST" class="buysell-form">
                            @csrf
                            @if(session()->has('declined'))
                                <div class="alert alert-danger">
                                    {{ session()->get('declined') }}
                                </div>
                            @endif
                            @if(session()->has('nop'))
                                <div class="alert alert-danger">
                                    {{ session()->get('nop') }}
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
                                    <label class="form-label" for="buysell-amount">Amount to Withdraw</label>
                                </div>
                                <div class="form-control-group">
                                    <input type="text" class="form-control form-control-lg form-control-number" id="buysell-amount" required name="amount" placeholder="100.00">
                                    <div class="form-dropdown">
                                        <div class="text">USD</div>
                                    </div>
                                </div>
                                <div class="form-note-group">
                                    <span class="buysell-min form-note-alt">Minimum: 50.00 USD</span>
                                    {{--                                <span class="buysell-rate form-note-alt">1 USD = 0.000016 BTC</span>--}}
                                </div>
                            </div><!-- .buysell-field -->
                            <div class="buysell-field form-group">
                                <div class="form-label-group">
                                    <label class="form-label">Payment Method</label>
                                </div>

                                    <div class="form-pm-group">
                                        <select name="withdraw_method_id" id="form-label"  class="form-control form-control-lg" required>
                                            <option selected disabled value="">choose</option>
                                            @foreach($w_method as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                            </div><!-- .buysell-field -->
                            <div class="buysell-field form-action">
                                <button class="btn btn-lg btn-block btn-primary" type="submit">Continue to Withdraw</button>
                            </div><!-- .buysell-field -->
                            <div class="form-note text-base text-center">Note: our transfer fee included, <a href="#">see our fees</a>.</div>
                        </form><!-- .buysell-form -->
                    </div><!-- .buysell-block -->
                </div><!-- .buysell -->
            </div>
        </div>
    </div>

@endsection
