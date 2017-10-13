@component('mail::message')
# Påminslse om att bekräfta din bokning

<p>Hej {{ $book->user->name }},</p>
<p>Kom ihåg att bekrfäta din bokning innan {{ $book->end_verf_date }} får att behålla din plats. Om inte bekrfätar din bokning kommer den att tas bort.</p>

@component('mail::button', ['url' => route('book.verf', [
    'nr' => $book->nr,
    'token' => $book->token,
])])
Bekrfäta bokning
@endcomponent

Hälsningar,<br>
{{ config('app.name') }}
@endcomponent
