@extends('layouts.app')
@section('content')
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Din bokning
                @if($user->book)
                    {!!  $user->book->verf ? '<span class="label label-success">Bekräftad</span>' : '<span class="label label-danger">Inte bekräftad</span>' !!}
                @endif
            </div>
            <div class="panel-body">
                @if($user->book)
                    <p><strong>Bokning nummer:</strong> {{ $user->book->nr }}</p>
                    <p><strong>Plats:</strong> {{ $user->book->place }}</p>
                    <p><strong>Bokad:</strong> {{ $user->book->created_at->toDateString() }}</p>
                    {!! $user->book->verf ? '' : '<p><strong>Bäkräfta sensat:</strong>:'. $user->book->end_verf_date .'</p>' !!}
                    <button class="btn btn-danger" id="deleteBook">Ta bort bokning</button>
                    {!! $user->book->verf ? '' : '<a href="'. route('book.verf.resend').'" class="btn btn-primary">Skicka nytt bäkträftelse mail</a>' !!}

                @else
                    <h3>Du har ingen bokning än!
                        <small>Se till att få bästa plasten</small>
                    </h3>
                    <a href="/" class="btn btn-lg btn-success">BOKA</a>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Din profil</div>
            <div class="panel-body">
                <p><strong>Namn:</strong> {{ $user->name }}</p>
                <p><strong>Nick:</strong> {{ $user->nick }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Mobil:</strong> {{ $user->mobile }}</p>
                <p><strong>Reqisted:</strong> {{$user->created_at->toDateString()}} </p>
                <button class="btn btn-danger" id="deleteAccount">Radera mitt konot</button>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Byt lösenord</div>
            <div class="panel-body">
                <form action="{{route('profile.update.password')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password">Nytt lösenord</label>
                        <input type="password" name="password" class="form-control">
                        @if ($errors->has('password'))
                            <span class="help-block">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                        <label for="password-confirm">Bäkräfta nytt lösenord</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('current') ? 'has-error' : '' }}">
                        <label for="current">Nuvarnde lösenord</label>
                        <input type="password" name="current" class="form-control">
                        @if ($errors->has('current'))
                            <span class="help-block">{{ $errors->first('current') }}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="submit" name="book" class="btn btn-success" value="Byt lösenord">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection