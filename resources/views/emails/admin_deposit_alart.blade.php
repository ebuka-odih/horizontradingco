@component('mail::message')
# Hello Admin

A new deposit alert

<p>Name: {{ $deposit->user->name }}</p>
<p>Deposit Amount: {{ $deposit->amount }}</p>
<p>Deposit Method: {{ optional($deposit->payment_wallet)->name }}</p>

Login your dashboard for verification

Thanks,<br>
{{ config('app.name') }}
@endcomponent
