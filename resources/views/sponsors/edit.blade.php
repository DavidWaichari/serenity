@extends('layouts.master')
@section('main-content')
@section('content-header')
    <h1>
        {!! $editSponsor->firstname !!} {!! $editSponsor->middlename !!} {!! $editSponsor->lastname !!}
    </h1>
    <ol class="breadcrumb">
        <li>{!! $editSponsor->firstname !!} {!! $editSponsor->middlename !!} {!! $editSponsor->lastname !!}</li>
    </ol>
@endsection
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" id="delete-client" method="POST" action="{!! route('sponsors.update',$editSponsor->id) !!}">
            {{ csrf_field() }}
            {{method_field('PUT')}}
            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                <label for="lastname" class="col-md-4 control-label">Last Name</label>
                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $editSponsor->lastname}}" required
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
                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $editSponsor->firstname}}" required
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
                    <input id="middlename" type="text" class="form-control" name="middlename" value="{{ $editSponsor->middlename}}" required
                           autofocus>
                    @if ($errors->has('middlename'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('middlename') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('idnumber') ? ' has-error' : '' }}">
                <label for="idnumber" class="col-md-4 control-label">ID Number</label>

                <div class="col-md-6">
                    <input id="idnumber" type="text" class="form-control" name="idnumber" value="{{ $editSponsor->idnumber}}"
                           required>

                    @if ($errors->has('idnumber'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('idnumber') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('residence') ? ' has-error' : '' }}">
                <label for="residence" class="col-md-4 control-label">Residence</label>

                <div class="col-md-6">
                    <input id="residence" type="text" class="form-control" name="residence" value="{{ $editSponsor->residence}}"
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
                    <input id="contact" type="text" class="form-control" name="contact" value="{{ $editSponsor->contact}}"
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
