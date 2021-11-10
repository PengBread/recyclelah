@component('mail::message')
# Recycle-Lah Reset Password

To reset your password, click the button below.

@component('mail::button', ['url' => $body['url']])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }} Team.
@endcomponent