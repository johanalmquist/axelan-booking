@component('mail::message')
# Vi har skapat ett konto för dig

<p>Hej {{ $user->name }},</p>
<p>vi har skapat ett konto åt dig på axelan.</p>
<p>Du loggar in med din e-post adress och detta lösenord {{$password}}</p>


Hälsningar,<br>
{{ config('app.name') }}
@endcomponent
