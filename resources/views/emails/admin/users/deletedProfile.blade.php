@component('mail::message')
# Ditt konto är bort taget

Hej {{ $user->nick }}! Vi har tagit bort ditt konto. Vid frågor kan du konkta oss.


Hälsningar,<br>
{{ config('app.name') }}
@endcomponent
