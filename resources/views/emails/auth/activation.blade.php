@component('mail::message')
# Aktivera ditt konto

Tack att du har skapat ett konto oss hos, aktivera ditt konto för att kunna logga in.

@component('mail::button', ['url' => route('auth.activate', [
				'token' => $user->activation_token,
				'email' => $user->email
			])])
	Aktivera
@endcomponent
Funkar inte knappen kopiera in länken i din webbläsare {{ route('auth.activate', [
				'token' => $user->activation_token,
				'email' => $user->email
			] }}
Hälsningar,<br>
{{ config('app.name') }}
@endcomponent
