@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
    </div>
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Administratörer</h2>
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
                        <th>Nick</th>
                        <th>Åtgärder</th>
                    </tr>
                    </thead>
                    @foreach($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->nick }}</td>
                            <td>
                                <a href="{{ route('admin.users.edit', ['userID' => $admin->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span> </a>
                                <button class="btn btn-danger deleteUser" data-user="{{$admin->id}}" data-nick="{{$admin->nick}}"><span class="fa fa-trash"></span></button>
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