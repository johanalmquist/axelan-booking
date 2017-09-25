@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Ändra bokning - {{ $book->nr }}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-6">Form</div>
                <div class="col-md-6">
                    <form action="{{route('admin.books.edit.changeplace')}}" method="post">
                        <div class="form-group {{ $errors->has('place') ? 'has-error' : '' }}">
                            <label class="control-label" for="place">Byt till annan plats</label>
                            <select name="place" class="form-control">
                                @for ($i = 1; $i <= 120; $i++)
                                    <option value="{{ $i}}"}}>{{ $i }}</option>
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