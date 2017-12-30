@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lägg till ny bokning</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-3">
                <form action="{{route('admin.books.new.save')}}" method="post" class="form-horizontal">
                <div class="form-group">
                    <label>Välj en användare</label>
                    <select name="user" class="form-control">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->nick}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group {{ $errors->has('place') ? 'has-error' : '' }}">
                    <label>Plats</label>
                    <input type="tel" class="form-control" name="place" value="{{old('place')}}">
                    @if($errors->has('place'))
                        <span class="help-block">
                                {{ $errors->first('place') }}
                            </span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Ska bokningen checkas in?</label>
                    <p>
                        NEJ <input type="radio" name="checkin" value="0" checked=""><br>
                        JA <input type="radio" name="checkin" value="1">
                    </p>
                </div>
                <div class="form-group">
                    <label class="control-label">Är bokningen betald?</label>
                        <p>
                            NEJ <input type="radio" name="paid" value="0" checked=""><br>
                            JA <input type="radio" name="paid" value="1">
                        </p>
                </div>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary">Boka</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection