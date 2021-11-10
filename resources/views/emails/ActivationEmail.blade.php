@component('mail::message')

Hi {{ $body['name'] }},

# Welcome to {{ config('app.name') }}!

Click this button to get verified.

@component('mail::button', ['url' => $body['url']])
Get Started
@endcomponent

Welcome aboard!<br>
{{ config('app.name') }} Team.
@endcomponent
