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

        <form method="post" name="spendform"><input type="hidden" name="form_id" value="16818278853525"><input type="hidden" name="form_token" value="f75868c6bc201888b17327dd409a3c6b">
            <input type="hidden" name="a" value="deposit">
            <br>

            <table cellspacing="1" cellpadding="2" border="0" width="100%" class="tab">
                <tbody><tr>
                    <th colspan="3">
                        <input type="radio" name="h_id" value="1" checked="" onclick="updateCompound()">
                        <!--	<input type=radio name=h_id value='1'  checked  > -->

                        <b>Plan 1</b></th>
                </tr><tr>
                    <td class="inheader">Plan</td>
                    <td class="inheader" width="200">Spent Amount ($)</td>
                    <td class="inheader" width="100" nowrap=""><nobr>Daily Profit (%)</nobr></td>
                </tr>
                <tr>
                    <td class="item">Plan 1</td>
                    <td class="item" align="right">$100.00 - $19999.00</td>
                    <td class="item" align="right">2.00</td>
                </tr>
                <tr>
                    <td colspan="3" align="right"><a href="javascript:openCalculator('1')">Calculate your profit &gt;&gt;</a></td>
                </tr>
                </tbody></table><br><br>
            <script>cps[1]=[];</script>
            <table cellspacing="1" cellpadding="2" border="0" width="100%" class="tab">
                <tbody><tr>
                    <th colspan="3">
                        <input type="radio" name="h_id" value="2" onclick="updateCompound()">
                        <!--	<input type=radio name=h_id value='2'  > -->

                        <b>Plan 2</b></th>
                </tr><tr>
                    <td class="inheader">Plan</td>
                    <td class="inheader" width="200">Spent Amount ($)</td>
                    <td class="inheader" width="100" nowrap=""><nobr>Daily Profit (%)</nobr></td>
                </tr>
                <tr>
                    <td class="item">Plan 2</td>
                    <td class="item" align="right">$20000.00 and more</td>
                    <td class="item" align="right">3.00</td>
                </tr>
                <tr>
                    <td colspan="3" align="right"><a href="javascript:openCalculator('2')">Calculate your profit &gt;&gt;</a></td>
                </tr>
                </tbody></table><br><br>
            <script>cps[2]=[];</script>

            <table cellspacing="0" cellpadding="2" border="0" class="blank">
                <tbody><tr>
                    <td>Your account balance ($):</td>
                    <td align="right">$0</td>
                </tr>
                <tr><td>&nbsp;</td>
                    <td align="right">
                        <small>
                        </small>
                    </td>
                </tr>
                <tr>
                    <td>Amount to Spend ($):</td>
                    <td align="right"><input type="text" name="amount" value="100.00" class="inpts" size="15" style="
 text-align: right;
    background-color: #353054;
    color: #fff;
    border-color: #353054;
    padding: 5px;
    outline: none;"></td>
                </tr>
                <tr id="coumpond_block" style="display:none">
                    <td>Compounding(%):</td>
                    <td align="right">
                        <select name="compound" class="inpts" id="compound_percents"></select>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <table cellspacing="0" cellpadding="2" border="0">
                            <tbody><tr>
                                <td><input type="radio" name="type" value="process_1006" checked=""></td>
                                <td>Spend funds from Bitcoin</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="type" value="process_1007"></td>
                                <td>Spend funds from Ethereum</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="type" value="process_1008"></td>
                                <td>Spend funds from Tether USDT (TRC20)</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="type" value="process_1009"></td>
                                <td>Spend funds from Tether USDT (ERC20)</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="type" value="process_1010"></td>
                                <td>Spend funds from Doge Coin</td>
                            </tr>
                            </tbody></table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Spend" class="sbmt"></td>
                </tr></tbody></table>
        </form>

        <script language="javascript">for(i=0;i<document.spendform.type.length;i++){if((document.spendform.type[i].value.match(/^process_/))){document.spendform.type[i].checked=true;break;}}updateCompound();</script>











    </div>

@endsection
