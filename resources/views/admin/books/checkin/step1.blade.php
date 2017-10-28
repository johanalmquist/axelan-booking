@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Checka in bokning - Hitta bokning</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-6 col-md-offset-3">
                    <form action="{{route('admin.books.checkin.step2')}}" method="post" class="center">
                        <div class="form-group {{ $errors->has('place') ? ' has-error' : '' }}">
                            <label for="place">Ange bokad plats * :</label>
                            <input type="tel" name="place" class="form-control input-lg" value="{{ old('place') }}">
                            @if($errors->has('place'))
                                <span class="help-block">
                                {{ $errors->first('place') }}
                            </span>
                            @endif
                        </div>
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-lg btn-primary" value="Hitta bokning">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/admin/books.js') }}"></script>
@endsection