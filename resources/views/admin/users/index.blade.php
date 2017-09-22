@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Användare</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Namn</th>
                        <th>E-post</th>
                        <th>Nick</th>
                        <th>Mobil</th>
                        <th>Född</th>
                        <th>Aktiverad</th>
                        <th>Medlem sedan</th>
                        <th>Åtgärder</th>
                    </tr>
                    </thead>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->nick }}</td>
                            <td>{{ $user->mobile }}</td>
                            <td>{{ $user->born }}</td>
                            <td>{{ $user->activate }}</td>
                            <td>{{ $user->created_at->toDateString() }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', ['userID' => $user->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span> </a>
                                <button class="btn btn-danger deleteUser" data-user="{{$user->id}}" data-nick="{{$user->nick}}"><span class="fa fa-trash"></span></button>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/admin/users.js') }}"></script>
@endsection()