<form action="/book/delete" method="post">
    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
        <label for="password">Lösenord</label>
        <span class="sr-only">Lösenord</span>
        <input type="password" name="password" class="form-control">
         @if ($errors->has('password'))
            <span class="help-block">
                {{ $errors->first('password') }}
            </span>
        @endif
    </div>

     <div class="form-group">
        <input type="submit" name="del" class="btn btn-lg btn-danger" value="Ta bort bokning">
    </div>
    {{ csrf_field() }}

</form>