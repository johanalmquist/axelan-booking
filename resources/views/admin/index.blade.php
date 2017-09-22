@extends('layouts.admin')
@section('content')
    <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-ticket"></i></div>
                <div class="count" id="totalBooks"></div>
                <h3>Bokningar</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-check"></i></div>
                <div class="count" id="totalBooksVerf"></div>
                <h3>Bekräftade bokningar</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-exclamation"></i></div>
                <div class="count" id="totalBooksNoVerf"></div>
                <h3>Ej bekräftade bokningar</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="count" id="totalUsers"></div>
                <h3>Användare</h3>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Senaste bokningar</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Plats</th>
                        <th>Nick</th>
                        <th>Bokad</th>
                        <th>Bäkräftad</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->nr }}</td>
                            <td>{{ $book->place }}</td>
                            <td>{{ $book->user->nick }}</td>
                            <td>{{ $book->created_at->toDateString() }}</td>
                            <td>{!! ($book->verf) ? '<span class="label label-success">JA</span>' : '<span class="label label-danger">NEJ</span>' !!}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="x_panel">
            <div class="x_title">
                <h2>Senaste regiterade användare</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Namn</th>
                        <th>Nick</th>
                        <th>E-post</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->nick }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/admin/countBoxes.js') }}"></script>
@endsection()