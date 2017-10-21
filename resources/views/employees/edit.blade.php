@extends('layouts.master')
@section('main-content')
@section('content-header')
    <h1>
       Edit Employee
    </h1>
    <ol class="breadcrumb">
        <li>{!! $editDetails->firstname !!} {!! $editDetails->middlename !!} {!! $editDetails->lastname !!}</li>
    </ol>
@endsection
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" id="delete-employee" method="POST" action="{!! route('employees.update',$editDetails->id) !!}">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                <label for="lastname" class="col-md-4 control-label">Last Name</label>
                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $editDetails->lastname}}" required
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
                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $editDetails->firstname}}" required
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
                    <input id="middlename" type="text" class="form-control" name="middlename" value="{{ $editDetails->middlename}}" required
                           autofocus>
                    @if ($errors->has('middlename'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('jobdescription') ? ' has-error' : '' }}">
                <label for="jobdescription" class="col-md-4 control-label">Job Description</label>
                <div class="col-md-6">
                        <textarea id="jobdescription" type="text" class="form-control" name="jobdescription"
                                   required
                                  autofocus>{{ $editDetails->jobdescription}}</textarea>
                    @if ($errors->has('jobdescription'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('jobdescription') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('residence') ? ' has-error' : '' }}">
                <label for="residence" class="col-md-4 control-label">Residence</label>

                <div class="col-md-6">
                    <input id="residence" type="text" class="form-control" name="residence" value="{{ $editDetails->residence}}"
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
                    <input id="contact" type="text" class="form-control" name="contact" value="{{ $editDetails->contact}}"
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
                        Save Changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
