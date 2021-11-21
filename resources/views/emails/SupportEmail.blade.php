@component('mail::message')
# Feedback Email
{{ $body['name'] }} has send a support email.

Title: {{ $body['title'] }}

{{ $body['description'] }}

@endcomponent
