@extends('dashboard.layouts.app')
@section('content')

<div id="page-wrapper" style="border-color: rgb(255, 255, 255) !important; min-height: 562px;">
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">Dashboard</h4>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="well">
                <h5>Username</h5>
                <div class="activity-list">{{ $user->username }}</div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="well">
                <h5>Regestration Date </h5> {{ date('M-d-Y', strtotime($user->created_at)) }}</div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="well">
                <h5>Account Balance</h5>
                <div class="activity-list"> $<b>{{ $user->balance ? : "0.00" }}</b></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="well">
                <h5>Earned Total</h5>$<b>0.00</b></div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="well">
                <h5>Pending Withdrawal</h5>
                <h3><span class="label label-default"></span> &nbsp;
                    <small style="font-size:13px;">
                        $<b>0.00</b></small></h3>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="well">
                <h5>Personal Affiliate link:</h5>
                <div style="    width: 100%;" class="input-group">
                        <span class="input-group-btn">
                           </span>
                    <input id="link" type="text" value="https://avillioncapital.com/p/?ref=nancy112" class="form-control">
                </div>
                <!-- /input-group -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="well">
                <h5>Last Deposit</h5>
                <div class="activity-list"> $<b>n/a</b></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="well">
                <h5>Last Withdraw</h5> $<b>n/a</b></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="well">
                <h5>Total Deposit</h5>
                <div class="activity-list"> $<b>{{ $total_dep ? : "0.00" }}</b></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="well">
                <h5>Total Withdraw</h5> $<b>0.00</b></div>
        </div>
    </div>
</div>

@endsection
