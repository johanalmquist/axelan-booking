@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Skapa konto</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Namn</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Post Adress</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('nick') ? ' has-error' : '' }}">
                            <label for="nick" class="col-md-4 control-label">Ditt gamenick</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control" name="nick" value="{{ old('nick') }}">

                                @if ($errors->has('nick'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nick') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('born') ? ' has-error' : '' }}">
                            <label for="born" class="col-md-4 control-label">När är du född</label>

                            <div class="col-md-6">
                                <input id="born" type="text" class="form-control" name="born" value="{{ old('born') }}" required placeholder="DD-MM-YYYY">

                                @if ($errors->has('born'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('born') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Lösenord</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Bekräfta Lösenord</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <hr class="separator">
                        <div class="form-group {{ $errors->has('participant_type') ? 'has-error' : '' }}">
                            <label for="participant_type" class="col-md-4 control-label">Är du besökare på Axelan?</label>

                            <div class="col-md-6">
                                <div class="radio">
                                    <input type="radio" name="participant_type" id="participant_type" value="0"> Ja, jag är gäst på axelan<br>
                                    <input type="radio" name="participant_type" id="participant_type" value="1"> Nej, jag läser data på axevalla<br>
                                    <input type="radio" name="participant_type" id="participant_type" value="2"> Ja, men jag har läst data på axevalla tidigare
                                </div>
                                @if ($errors->has('participant_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('participant_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Skapa konto
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
