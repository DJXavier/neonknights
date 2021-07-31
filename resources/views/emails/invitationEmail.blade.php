@component('mail::message')


Hello, and welcome to NeonKnights!



You have been invited to join in on {{$gameName}}!

@component('mail::button', ['url' => $gameLink])
Create Your Knight
@endcomponent

{{ config('app.name') }}
@endcomponent