@extends('layouts.master')
@section('main-content')
@section('content-header')
    <h1>
        Add Client
    </h1>
    <ol class="breadcrumb">
        <li>Add Client</li>
    </ol>
@endsection
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{!! route('clients.store') !!}">
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
                <label for="lastname" class="col-md-4 control-label">Last Name</label>

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
                <label for="firstname" class="col-md-4 control-label">First Name</label>

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
            <div class="form-group{{ $errors->has('middlename') ? ' has-error' : '' }}">
                <label for="middlename" class="col-md-4 control-label">Middle Name</label>

                <div class="col-md-6">
                    <input id="middlename" type="text" class="form-control" name="middlename"
                           value="{{ old('middlename') }}" required
                           autofocus>
                    @if ($errors->has('middlename'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('medicalhistory') ? ' has-error' : '' }}">
                <label for="medicalhistory" class="col-md-4 control-label">Medical History</label>
                <div class="col-md-6">
                        <textarea id="medicalhistory" type="text" class="form-control" name="medicalhistory"
                                  value="{{ old('medicalhistory') }}" required
                                  autofocus></textarea>
                    @if ($errors->has('medicalhistory'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('medicalhistory') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('drugofchoice') ? ' has-error' : '' }}">
                <label for="drugofchoice" class="col-md-4 control-label">Drug of Choice</label>

                <div class="col-md-6">
                    <input id="drugofchoice" type="text" class="form-control" name="drugofchoice"
                           value="{{ old('drugofchoice') }}"
                           required>

                    @if ($errors->has('drugofchoice'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('drugofchoice') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('residence') ? ' has-error' : '' }}">
                <label for="residence" class="col-md-4 control-label">Residence</label>

                <div class="col-md-6">
                    <input id="residence" type="text" class="form-control" name="residence"
                           value="{{ old('residence') }}"
                           required>

                    @if ($errors->has('residence'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('residence') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                <label for="contact" class="col-md-4 control-label">Contact</label>

                <div class="col-md-6">
                    <input id="contact" type="text" class="form-control" name="contact" value="{{ old('contact') }}"
                           required>

                    @if ($errors->has('contact'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
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
