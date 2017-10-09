@component('mail::message')
# Verf din bokning

Hej, {{$book->user->nick}} ! Klicka på knappen nedan för att verf din bokning.

@component('mail::button', ['url' => route('book.verf', [
    'nr' => $book->nr,
    'token' => $book->token,
])])
Bekräfta bokning
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
