@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Bokningar</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>Boknings nummer</th>
                        <th>Plats</th>
                        <th>Bokad av</th>
                        <th>Bokad ifrån IP</th>
                        <th>Bekfätdad</th>
                        <th>Bekföta senast</th>
                        <th>Bokad</th>
                        <th>Åtgärder</th>
                    </tr>
                    </thead>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->nr }}</td>
                            <td>{{ $book->place }}</td>
                            <td>{{ $book->user->nick }}</td>
                            <td>{{ $book->ip }}</td>
                            <td>{{ $book->verf ? 'JA' : 'NEJ' }}</td>
                            <td>{{ $book->end_verf_date }}</td>
                            <td>{{ $book->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('admin.books.edit', ['bookNR' => $book->nr]) }}" title="Byt plats" class="btn btn-warning"><span class="fa fa-edit"></span> </a>
                                <button class="btn btn-danger deleteBook" data-id="{{$book->id}}" data-nr="{{$book->nr}}"><span class="fa fa-trash"></span></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/admin/books.js') }}"></script>
@endsection