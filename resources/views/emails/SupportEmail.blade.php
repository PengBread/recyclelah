@component('mail::message')
# {{ $body['category'] }} E-mail

{{ $body['name'] }} has send a {{ $body['category'] }} email.

Title: {{ $body['title'] }}<br>
From: {{ $body['email'] }}

Description:<br>
{{ $body['description'] }}

@endcomponent
