@component('mail::message')

Hi, {{ $body['name'] }},

{{ $body['description'] }}

Thanks,<br>
{{ config('app.name') }} Team
@endcomponent
