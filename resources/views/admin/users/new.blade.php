@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Lägg till ny användare</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{route('admin.users.new.save')}}" method="post">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="fullname">Namn * :</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : '' }}" />
                        @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="fullname">E-post * :</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : '' }}" required/>
                        @if($errors->has('email'))
                            <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('nick') ? ' has-error' : '' }}">
                        <label for="fullname">Nick * :</label>
                        <input type="text" class="form-control" name="nick" value="{{ old('nick') ? old('nick') : '' }}" required/>
                        @if($errors->has('nick'))
                            <span class="help-block">
                                {{ $errors->first('nick') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('born') ? ' has-error' : '' }}">
                        <label for="fullname">Född * :</label>
                        <input type="text" class="form-control" name="born" value="{{ old('born') ? old('born') :'' }}" required/>
                        @if($errors->has('born'))
                            <span class="help-block">
                                {{ $errors->first('born') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('admin') ? 'has-error' : '' }}">
                        <label class="control-label">Ska vara admin *:</label>
                        <p>
                            <input type="radio" class="flat" name="admin" value="0" /> NEJ<br>
                            <input type="radio" class="flat" name="admin" value="1" /> JA
                        </p>
                        @if($errors->has('admin'))
                            <span class="help-block">
                                {{ $errors->first('admin') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('participant_type') ? 'has-error' : '' }}">
                        <label class="control-label">Är användren en besökare på axelan *:</label>
                        <p>
                            <input type="radio"  name="participant_type" value="0">Ja, användren är en besökare<br>
                            <input type="radio" name="participant_type" value="1"> Nej, användren läser data <br>
                            <input type="radio" name="participant_type" value="2"> Ja, men användren har läst data
                        </p>
                        @if($errors->has('participant_type'))
                            <span class="help-block">
                                {{ $errors->first('participant_type') }}
                            </span>
                        @endif
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-large btn-success" value="Lägg till ny användare">
                </form>
            </div>
        </div>
    </div>
@endsection