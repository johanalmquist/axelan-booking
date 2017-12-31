@component('mail::message')
# Bekräfta din bokning

Hej, {{$book->user->nick}} ! Klicka på knappen nedan för att bekräfta din bokning.

@component('mail::button', ['url' => route('book.verf', [
    'nr' => $book->nr,
    'token' => $book->token,
])])
Bekräfta bokning
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
