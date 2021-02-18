@component('mail::message')
# Contact form

<p>Subject : {{ request('subject') }}</p>
<p>Message : {{ request('message') }}</p>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
