@component('mail::message')
# Feedback Email

{{ $body['name'] }} send us a {{ $body['title'] }} email.

{{ $body['description'] }}

@endcomponent
