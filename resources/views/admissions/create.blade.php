@extends('layouts.master')
@section('main-content')
@section('content-header')
    <h1>
        Add Admission
    </h1>
    <ol class="breadcrumb">
        <li>Admit a client</li>
    </ol>
@endsection
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{!! route('admissions.store') !!}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('clientsadmn') ? ' has-error' : '' }}">
                <label for="clientsadmn" class="col-md-4 control-label">Admission Number</label>

                <div class="col-md-6">
                    <input id="clientsadmn" type="text" class="form-control" name="clientsadmn" value="{{ old('clientsadmn') }}"
                           required
                           autofocus>
                    @if ($errors->has('clientsadmn'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('clientsadmn') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('clientsname') ? ' has-error' : '' }}">
                <label for="clientsname" class="col-md-4 control-label">Clients Name</label>

                <div class="col-md-6">
                    <input id="clientsname" type="text" class="form-control" name="clientsname"
                           value="{{ old('clientsname') }}" required
                           autofocus>
                    @if ($errors->has('clientsname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('clientsname') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('sponsorsname') ? ' has-error' : '' }}">
                <label for="sponsorsname" class="col-md-4 control-label">Sponsors Name</label>

                <div class="col-md-6">
                    <input id="sponsorsname" type="text" class="form-control" name="sponsorsname"
                           value="{{ old('sponsorsname') }}" required
                           autofocus>
                    @if ($errors->has('sponsorsname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('sponsorsname') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('station') ? ' has-error' : '' }}">
                <label for="station" class="col-md-4 control-label">Station</label>

                <div class="col-md-6">
                    <select required class="form-control" name="station" id="station">
                        <option value="">Select Station</option>
                        <option value="Nakuru">Nakuru</option>
                        <option value="Nairobi">Nairobi</option>
                        <option value="Mombasa">Mombasa</option>
                    </select>
                    @if ($errors->has('station'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('station') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('expectedexitdate') ? ' has-error' : '' }}">
                <label for="expectedexitdate" class="col-md-4 control-label">Expected Exit Date</label>

                <div class="col-md-6">
                    <input id="expectedexitdate" type="date" class="form-control" name="expectedexitdate"
                           value="{{ old('expectedexitdate') }}"
                           required>

                    @if ($errors->has('expectedexitdate'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('expectedexitdate') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('exitdate') ? ' has-error' : '' }}">
                <label for="exitdate" class="col-md-4 control-label">Exit Date</label>

                <div class="col-md-6">
                    <input id="exitdate" type="date" class="form-control" name="exitdate"
                           value="{{ old('exitdate') }}"
                    >

                    @if ($errors->has('exitdate'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('exitdate') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('exitcomments') ? ' has-error' : '' }}">
                <label for="exitcomments" class="col-md-4 control-label">Exit Comments</label>

                <div class="col-md-6">
                        <textarea id="exitcomments" type="text" class="form-control" name="exitcomments"
                                  value="{{ old('exitcomments') }}"
                                  autofocus></textarea>
                    @if ($errors->has('exitcomments'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('exitcomments') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
