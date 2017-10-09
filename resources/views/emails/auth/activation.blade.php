@component('mail::message')
# Aktivera ditt konto

Tack att du har skapat ett konto oss hos, aktivera ditt konto för att kunna logga in.

@component('mail::button', ['url' => route('auth.activate', [
				'token' => $user->activation_token,
				'email' => $user->email
			])])
	Aktivera
@endcomponent

Hälsningar,<br>
{{ config('app.name') }}
@endcomponent
