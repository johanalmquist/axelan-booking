@extends('layouts.admin')
@section('content')
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Ändra användare - {{ $member->nick }}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form action="{{route('admin.users.update')}}" method="post">
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="fullname">Namn * :</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $member->name }}" />
                        @if($errors->has('name'))
                            <span class="help-block">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="fullname">E-post * :</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $member->email }}" required/>
                        @if($errors->has('email'))
                            <span class="help-block">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('nick') ? ' has-error' : '' }}">
                        <label for="fullname">Nick * :</label>
                        <input type="text" class="form-control" name="nick" value="{{ old('nick') ? old('nick') : $member->nick }}" required/>
                        @if($errors->has('nick'))
                            <span class="help-block">
                                {{ $errors->first('nick') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                        <label for="fullname">Mobil * :</label>
                        <input type="tel" class="form-control" name="mobile" value="{{ old('mobile') ? old('mobile') : $member->mobile }}" required/>
                        @if($errors->has('mobile'))
                            <span class="help-block">
                                {{ $errors->first('mobile') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('born') ? ' has-error' : '' }}">
                        <label for="fullname">Född * :</label>
                        <input type="text" class="form-control" name="born" value="{{ old('born') ? old('born') : $member->born }}" required/>
                        @if($errors->has('born'))
                            <span class="help-block">
                                {{ $errors->first('born') }}
                            </span>
                        @endif
                    </div>
                    <div class="form-group {{ $errors->has('admin') ? 'has-error' : '' }}">
                        <label>Ska vara admin *:</label>
                        <p>
                            <input type="radio" class="flat" name="admin" value="0" {{ !$member->isAdmin($member->id) ? 'checked=""' : '' }} /> NEJ<br>
                            <input type="radio" class="flat" name="admin" value="1" {{ $member->isAdmin($member->id) ? 'checked=""' : '' }} /> JA
                        </p>
                    </div>
                    <div class="form-group">
                        <label>Är användren en besökare på axelan *:</label>
                        <p>
                            <input type="radio" name="participant_type" value="0" {{ $member->participant_type == 0 ? 'checked=""' : '' }}> Ja, användren är en besökare<br>
                            <input type="radio"name="participant_type" value="1" {{ $member->participant_type == 1 ? 'checked=""' : '' }}> Nej, användren läser data <br>
                            <input type="radio"name="participant_type" value="2" {{ $member->participant_type == 2 ? 'checked=""' : '' }}> Ja, men användren har läst data
                        </p>
                    </div>
                    {{ csrf_field() }}
                    <input type="hidden" name="userID" value="{{$member->id}}">
                    <input type="submit" class="btn btn-large btn-success" value="Uppdatera">
                </form>
            </div>
        </div>
    </div>
@endsection