@if (Auth::check())
<form action="/book" method="post">
    <div class="form-group {{ $errors->has('place') ? 'has-error' : '' }}">
        <label for="place">Klicka på den plats du vill sitta på</label>
        <span class="sr-only">Vart vill du sitta</span>
        <input type="tel" name="place"  class="form-control bookPlace" value="{{ old('place') }}" placeholder="Plats" value="" readonly>
        @if ($errors->has('place'))
            <span class="help-block">
                {{ $errors->first('place') }}
            </span>
        @endif
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
        <div class="checkbox">
            <label>
            <input type="checkbox" name="roles" value="1">
                Jag har läst och försått <a href="#" data-toggle="modal" data-target="#showRoles">regelerna</a>
            </label>
            <span class="help-block">
                @if ($errors->has('roles'))
                    <span class="help-block">
                        {{ $errors->first('roles') }}
                    </span>
                @endif
            </span>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" name="book" class="btn btn-lg btn-primary" value="Boka">
    </div>
    {{ csrf_field() }}
    @else
</form>
<h3>Logga in för att boka.</h3>
<form action="{{ route('login') }}" method="post">
{{ csrf_field() }}
    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <label for="email">E-post adress</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="E-post adress">
        @if ($errors->has('email'))
            <span class="help-block">
                {{ $errors->first('email') }}
            </span>
        @endif
    </div>

    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="password">Lösenord</label>
        <input type="password" name="password" class="form-control">
        @if ($errors->has('password'))
            <span class="help-block">
                {{ $errors->first('password') }}
            </span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <a href="/register" class="btn btn-success">Skapa konto</a>
</form>
@endif