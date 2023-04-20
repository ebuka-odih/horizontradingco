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
    </style>

    <div id="page-wrapper" style="min-height: 529px; border-color: rgb(255, 255, 255) !important;">
        <div class="row">
            <div class="col-lg-12">

            </div>
            <!-- /.col-lg-12 -->
        </div>



        <br>




        <script language="javascript">function openCalculator(id){w=225;h=400;t=(screen.height-h-30)/2;l=(screen.width-w-30)/2;window.open('?a=calendar&type='+id,'calculator'+id,"top="+t+",left="+l+",width="+w+",height="+h+",resizable=1,scrollbars=0");for(i=0;i<document.spendform.h_id.length;i++){if(document.spendform.h_id[i].value==id){document.spendform.h_id[i].checked=true;}}}function updateCompound(){var id=0;var tt=document.spendform.h_id.type;if(tt&&tt.toLowerCase()=='hidden'){id=document.spendform.h_id.value;}else{for(i=0;i<document.spendform.h_id.length;i++){if(document.spendform.h_id[i].checked){id=document.spendform.h_id[i].value;}}}var cpObj=document.getElementById('compound_percents');if(cpObj){while(cpObj.options.length!=0){cpObj.options[0]=null;}}if(cps[id]&&cps[id].length>0){document.getElementById('coumpond_block').style.display='';for(i in cps[id]){cpObj.options[cpObj.options.length]=new Option(cps[id][i]);}}else{document.getElementById('coumpond_block').style.display='none';}}var cps={};</script>




        <br>

        <form method="post" name="spendform" action="{{ route('user.processInvest') }}">
            @csrf
            <br>
            @foreach($plans as $item)

                <div class="table-responsive">
                    <table cellspacing="1" cellpadding="2" border="0" width="100%" class="tab">
                        <tbody>
                        <tr>
                            <th colspan="4">
                                <input type="radio" name="h_id" value="1"  onclick="updateCompound()">
                                <b>{{ $item->name }}</b>
                            </th>
                        </tr>
                        <tr>
                            <td class="inheader">Plan</td>
                            <td class="inheader" width="200">Spent Amount ($)</td>
                            <td class="inheader" width="100" nowrap=""><nobr>Daily Profit (%)</nobr></td>
                            <td class="inheader" width="100" nowrap=""><nobr>Term (Days)</nobr></td>
                        </tr>

                        <tr>
                            <td class="item">{{ $item->name }}</td>
                            <td class="item" align="right">${{ $item->min_deposit.".00" }} - ${{ $item->max_deposit.".00" }}</td>
                            <td class="item" align="right">{{ $item->daily_interest }}</td>
                            <td class="item" align="right">{{ $item->term_days }}</td>
                        </tr>
                        <input type="hidden" name="package_id" value="{{ $item->id }}">

                        </tbody>
                    </table>
                </div>

                <br><br>
            @endforeach


            <table cellspacing="0" cellpadding="2" border="0" class="blank">
                <tbody><tr>
                    <td>Your account balance ($):</td>
                    <td align="right">$ {{ auth()->user()->balance ? : '0.00' }}</td>
                </tr>
                <tr><td>&nbsp;</td>
                    <td align="right">
                        <small>
                        </small>
                    </td>
                </tr>
                <tr>
                    <td>Enter Amount to Spend ($):</td>
                    <td align="right"><input type="text" name="amount" value="100.00" class="inpts" size="15" style="
 text-align: right;
    background-color: #353054;
    color: #fff;
    border-color: #353054;
    padding: 5px;
    outline: none;"></td>
                </tr>
                <tr>
                   <td colspan="3">
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
                   </td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" value="Invest" class="sbmt"></td>
                </tr></tbody></table>
        </form>

        <script language="javascript">for(i=0;i<document.spendform.type.length;i++){if((document.spendform.type[i].value.match(/^process_/))){document.spendform.type[i].checked=true;break;}}updateCompound();</script>



    </div>

@endsection
