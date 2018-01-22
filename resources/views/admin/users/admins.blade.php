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
    <script src="{{asset('js/admin/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/admin/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/admin/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('js/admin/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('js/admin/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('js/admin/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('js/admin/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('js/admin/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('js/admin/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('js/admin/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('js/admin/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('js/admin/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript">
        $('table').dataTable( {
            paginate: true,
            scrollY: 500
        } );
    </script>
@endsection()