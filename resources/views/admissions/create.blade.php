@extends('layouts.master')
@section('main-content')
@section('content-header')
    <h1>
        Add Admission
    </h1>
    <ol class="breadcrumb">
        <li>Add Admission</li>
    </ol>
@endsection
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="#">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('admno') ? ' has-error' : '' }}">
                <label for="admno" class="col-md-4 control-label">Admission Number</label>

                <div class="col-md-6">
                    <input id="admno" type="text" class="form-control" name="admno" value="{{ old('admno') }}"
                           required
                           autofocus>
                    @if ($errors->has('admno'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('admno') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                <label for="lastname" class="col-md-4 control-label">Clients Name</label>

                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control" name="lastname"
                           value="{{ old('lastname') }}" required
                           autofocus>
                    @if ($errors->has('lastname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                <label for="firstname" class="col-md-4 control-label">Sponsors Name</label>

                <div class="col-md-6">
                    <input id="firstname" type="text" class="form-control" name="firstname"
                           value="{{ old('firstname') }}" required
                           autofocus>
                    @if ($errors->has('firstname'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('expecteddateofexit') ? ' has-error' : '' }}">
                <label for="expecteddateofexit" class="col-md-4 control-label">Expected Exit Date</label>

                <div class="col-md-6">
                    <input id="expecteddateofexit" type="date" class="form-control" name="expecteddateofexit"
                           value="{{ old('expecteddateofexit') }}"
                           required>

                    @if ($errors->has('expecteddateofexit'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('expecteddateofexit') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('dateofexit') ? ' has-error' : '' }}">
                <label for="dateofexit" class="col-md-4 control-label">Exit Date</label>

                <div class="col-md-6">
                    <input id="dateofexit" type="date" class="form-control" name="dateofexit"
                           value="{{ old('dateofexit') }}"
                    >

                    @if ($errors->has('dateofexit'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('dateofexit') }}</strong>
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
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
