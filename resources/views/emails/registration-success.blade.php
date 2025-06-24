@component('mail::message')
# Welcome {{ $user->name }}!

Your registration is complete and verified.

@component('mail::button', ['url' => route('user.dashboard')])
Visit Dashboard
@endcomponent

Thanks, <br>
{{ config('app.name') }}
@endcomponent
