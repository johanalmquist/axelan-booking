@component('mail::message')
# Updaterat din profil

Hej {{ $user->nick }}! Vi har uppdaterat din profil.



Hälsningar,<br>
{{ config('app.name') }}
@endcomponent
