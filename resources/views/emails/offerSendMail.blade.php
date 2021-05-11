@component('mail::message')
# Make Appointment student and advisor

Appointment Has Accept

@component('mail::button', ['url' => $offer['url']])

Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent