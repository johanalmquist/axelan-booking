@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Checka in bokning - {{ $book->nr }} bokad av {{ $book->user->name }}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{route('admin.books.checkin')}}" method="post">
                    <div class="form-group col-md-offset-5">
                        <h3>Är denna bokning betalt</h3>
                        JA <input type="radio" name="paid" value="1" checked=""> NEJ <input type="radio" name="paid" value="0">
                    </div>
                    <input type="hidden" name="bookID" value="{{$book->id}}">
                    {{ csrf_field() }}
                    <div class="col-md-offset-5">
                        <button type="submit" class="btn btn-lg btn-primary"><strong>Checka in bokning</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/admin/books.js') }}"></script>
@endsection