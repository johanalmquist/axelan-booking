@component('mail::message')
# Updaterat din profil

Hej {{ $user->name }}! Vi har uppdaterat din profil.



Hälsningar,<br>
{{ config('app.name') }}
@endcomponent
