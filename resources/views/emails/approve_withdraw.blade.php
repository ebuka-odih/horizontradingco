@component('mail::message')
# Dear {{ $withdraw->user->fullname() }}

You have successfully received your withdrawal from <a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a> to your {{ $withdraw->withdraw_method['value'] }} wallet

<p>Amount: $@convert($withdraw->amount)</p>

<p>Be informed that any deposit made on our VIP plan package attracts and instant bonus of $1000 instantly withdraw- able.
    <br>Please chat our live customer support for more details</p>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
