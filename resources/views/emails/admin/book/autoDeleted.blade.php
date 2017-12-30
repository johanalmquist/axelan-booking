@component('mail::message')
# Din bokning är borttagen

Hej {{ $book->user->name }},

<p>Vårt system har tagit bort din bokning då du inte hade bekräftat bokningen innan {{ $book->end_verf_date }}</p>
<p>Om du fortfrande vill komma till axelan måste du göra en bokning.</p>
<p>Om du har några frågor kan du kontakta oss</p>



@component('mail::button', ['url' => url('/')])
Boka om
@endcomponent

Hälsningar,<br>
{{ config('app.name') }}
@endcomponent
