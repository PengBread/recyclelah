{{-- Wellcome, user {{ $name }}
Please activate your account :  --}}
{{-- {{ url('user/activation', $link)}} --}}

# Welcome to Recycle-Lah!

The body of content EDIT THIS.

<a class="btn btn-link p-0 m-0 align-baseline" href='http://127.0.0.1:8000/userLogin' >{{ __('Visit Site') }}</a>

Thanks, <br>
{{ config('app.name') }}

{{-- @component('mail::button', ['url' => 'http://127.0.0.1:8000/'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}