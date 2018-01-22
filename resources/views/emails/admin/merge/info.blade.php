@component('mail::message')
# Vi har bytt bokninsystem

Hej {{$book->user->name}},<br>
Vi har idag bytt bokningssystem. Med det nya bokningssystmet hoppas vi att det blir lättare för dig att boka och lättare för att hantera bokning.
<p>
    Med det nya bokningsystsmet måste man ha ett konto för att kunna boka. Men för att underlätta för dig har vi skapat ett konto samt föröver din bokning så du kan behålla din plats.<br>
    För att logga in anger du din e-post adress: <b>{{ $book->user->email }}</b> och detta lösenord: <b> {{ $password }}</b>.
</p>
<p>
    När du kommer till axelan säger du din plats <b>{{ $book->place }}</b> för att checka in.
</p>

@component('mail::button', ['url' => url('/login')])
Logga in redan idag!
@endcomponent

Hälsningar,<br>
{{ config('app.name') }}
@endcomponent
