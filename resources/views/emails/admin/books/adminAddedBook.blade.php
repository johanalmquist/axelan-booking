@component('mail::message')
# Vi har bokat åt dig

<p>Hej {{$book->user->nick}},</p>
<p>Vi har bokat plats {{ $book->place }} åt dig.</p>


Hälsningar,<br>
{{ config('app.name') }}
@endcomponent
