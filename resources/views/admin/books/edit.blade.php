@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Ändra bokning - {{ $book->nr }} {!! $book->verf ? '<zpan class="label label-success">Bekräftad</span>' : '<zpan class="label label-danger">Inte Bekräftad</span>'  !!}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-6">
                    <p><strong>Bokad av:</strong>{{ $book->user->nick }}</p>
                    <p><strong>Plats:</strong> {{ $book->place }}</p>
                    <p><strong>Bokad:</strong> {{ $book->created_at }}</p>
                    <a href="{{ route('admin.users.edit', ['userID' => $book->user->id]) }}" class="btn btn-success">Visa användare</a>
                    @if (!$book->verf)
                        <button class="verfBook btn btn-warning" data-id="{{ $book->id }}">Bekräfta bokningen</button>
                    @endif
                    @if (!$book->paid)
                        <a href="{{route('admin.books.paid', ['bookID' => $book->id])}}" class="btn btn-primary">Är betald</a>
                    @endif
                    <button class="btn btn-danger deleteBook" data-id="{{$book->id}}" data-nr="{{$book->nr}}">Ta bort bokning</button>
                </div>
                <div class="col-md-6">
                    <form action="{{route('admin.books.edit.changeplace')}}" method="post">
                        <div class="form-group {{ $errors->has('place') ? 'has-error' : '' }}">
                            <label class="control-label" for="place">Byt till annan plats</label>
                            <select name="place" class="form-control">
                                @for ($i = 1; $i <= 120; $i++)
                                    <option value="{{ $i}}"}} {{ $book->place == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                            @if($errors->has('place'))
                                <span class="help-block">{{ $errors->first('place') }}</span>
                            @endif
                        </div>
                        <input type="hidden" name="bookID" value="{{ $book->id }}">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="Byt till annan plats">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/admin/books.js') }}"></script>
@endsection