@component('mail::message')
# Bokning borttagen

Hej, {{ $book->user->name }}! Vi har tagit bort din boking. Vid frågor kan du kontakta oss.



Hälsningar,<br>
{{ config('app.name') }}
@endcomponent
