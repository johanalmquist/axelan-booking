@component('mail::message')
# Ditt konto är bort taget

Hej {{ $user->nick }}! Vi har tagir bort ditt konto. Vid frågor kan du konkta oss.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
