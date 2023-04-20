@extends('dashboard.layouts.app')
@section('content')
    <style>
        .sbmt {
            background-color: #ffa800;
            border-color: #ffa800;
            padding: 10px;
            width: 40%;
            color: #fff;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }

    </style>

    <div id="page-wrapper" style="min-height: 529px; border-color: rgb(255, 255, 255) !important;">
        <div class="row">
            <div class="col-lg-12">

            </div>
            <!-- /.col-lg-12 -->
        </div>



        <br>


        <table  class="table table-striped">
            <tr>
                <th>Name:</th>
                <td>Bill Gates</td>
            </tr>
            <tr>
                <th>Telephone:</th>
                <td>555 77 854</td>
            </tr>
            <tr>
                <th>Telephone:</th>
                <td>555 77 855</td>
            </tr>
        </table>
        <br>

        @if( $deposit_detail->status == 1)
            <table cellspacing=1 cellpadding=2 border=0 width=100%  class="tab">
                <tr style="margin-bottom: 10px;">
                    <th colspan="3" class=inheader><b>INVESTMENT DETAILS</b></th>
                </tr>
                <tr>
                <tr>
                    <th>PLAN:</th>
                    <td colspan="2">{{ optional($deposit_detail->package)->name }}</td>
                </tr>
                <tr>
                    <th>INVESTED AMOUNT:</th>
                    <td colspan="2">${{ $deposit_detail->amount }}</td>
                </tr>
                <tr>
                    <th>ROI:</th>
                    <td colspan="2">${{ $profit.".00" }}</td>
                </tr>
                <tr>
                    <th>TOTAL RETURN (WITH CAPITAL):</th>
                    <td colspan="2">${{ $profit + $deposit_detail->amount.'.00' }}</td>
                </tr>
                <tr>
                    <th>START DATE:</th>
                    <td colspan="2">{{ date('d-M-y', strtotime($deposit_detail->updated_at)) }}</td>
                </tr>
                <tr>
                    <th>ENDING DATE:</th>
                    <td colspan="2">{{ date('d-M-y', strtotime($deposit_detail->end_date)) }}</td>
                </tr>
                <tr>
                    <th>INTERVAL:</th>
                    <td colspan="2">{{ optional($deposit_detail->package)->term_days }} Days</td>
                </tr>
                <tr>
                    <th>DAILY PROFIT:</th>
                    <td colspan="2">{{ optional($deposit_detail->package)->daily_interest }}(%)</td>
                </tr>
                <tr>
                    <th>TOTAL PROFIT (%):</th>
                    <td colspan="2">{{ optional($deposit_detail->package)->total_return() }}(%)</td>
                </tr>
                <tr>
                    <th>STATUS:</th>
                    @if($deposit_detail->status == 'pending')
                        <td colspan="2"> <p><button class="w3-button w3-orange">Pending</button></p></td>
                        {{--                    <td style="color: #e0b802" colspan="2"><button>Pending</button></td>--}}
                    @else
                        <td colspan="2"><p><button class="w3-button w3-green">Approved</button></p></td>
                    @endif
                </tr>
                <tr>
                    <td colspan=3>&nbsp;</td>
                </tr>
                <tr>
                    <th>PROFIT EARNED:</th>
                    <td colspan="2">$ {{ $deposit_detail->earning }} (without capital)</td>
                </tr>
                <tr>
                    <th>TOTAL EARNED:</th>
                    <td colspan="2">$ {{  $deposit_detail->total_earned }} (plus capital)</td>
                </tr>
                <tr>
                    <th> PROGRESS :</th>
                    @if($deposit_detail->package->term_days == $i)
                        <td colspan="2">Plan Ended</td>
                    @else
                        <td colspan="2">Plan In Progress...</td
                    @endif
                </tr>
                <tr>
                    <td colspan=3>&nbsp;</td>
                </tr>

            </table>
        @else
            <table cellspacing=1 cellpadding=2 border=0 width=100%  class="tab">
                <tr style="margin-bottom: 10px;">
                    <th colspan="3" class=inheader><b>TRANSACTION DETAILS</b></th>
                </tr>
                <tr>
                <tr>
                    <th>CHOSEN PLAN:</th>
                    <td colspan="2">{{ optional($deposit_detail->package)->name }}</td>
                </tr>
                <tr>
                    <th>INVESTMENT AMOUNT:</th>
                    <td colspan="2">${{ $deposit_detail->amount }}</td>
                </tr>
                <tr>
                    <th>EXPECTED PROFIT:</th>
                    <td colspan="2">${{ $profit }}</td>
                </tr>
                <tr>
                    <th>INVESTMENT INTERVAL:</th>
                    <td colspan="2">{{ optional($deposit_detail->package)->term_days }} Days</td>
                </tr>
                <tr>
                    <th>INVESTMENT DAILY PROFIT:</th>
                    <td colspan="2">{{ optional($deposit_detail->package)->daily_interest }}(%)</td>
                </tr>
                <tr>
                    <th>INVESTMENT TOTAL PROFIT:</th>
                    <td colspan="2">{{ optional($deposit_detail->package)->total_return() }}(%)</td>
                </tr>
                <tr>
                    <th>TRANSACTION STATUS:</th>
                    @if($deposit_detail->status == 'pending')
                        <td colspan="2"> <p><button class="w3-button w3-orange">Pending</button></p></td>
                        {{--                    <td style="color: #e0b802" colspan="2"><button>Pending</button></td>--}}
                    @else
                        <td colspan="2"><p><button class="w3-button w3-green">Approved</button></p></td>
                    @endif
                </tr>
            </table>
            <h6 style="color: #e34653; padding-bottom: 5px;">Note that maturity period starts counting from the minute your payment is approved</h6>

        @endif



    </div>

@endsection
