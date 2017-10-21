@extends('layouts.master')
@section('main-content')
@section('content-header')
    <h1>
       {!! $clientsDetails->firstname !!} {!! $clientsDetails->middlename !!} {!! $clientsDetails->lastname !!}
    </h1>
    <ol class="breadcrumb">
        <li>{!! $clientsDetails->firstname !!} {!! $clientsDetails->middlename !!} {!! $clientsDetails->lastname !!}</li>
    </ol>
@endsection
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" id="delete-client" method="POST" action="{!! route('clients.destroy',$clientsDetails->id) !!}">
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            <div class="form-group{{ $errors->has('admno') ? ' has-error' : '' }}">
                <label for="admno" class="col-md-4 control-label">Admission Number</label>

                <div class="col-md-6">
                    <input id="admno" type="text" class="form-control" name="admno" value="{{$clientsDetails->admno }}"
                           autofocus readonly>
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
                           value="{{ $clientsDetails->lastname }}"
                           autofocus readonly>
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
                           value="{{$clientsDetails->firstname}}"
                           autofocus readonly>
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
                           value="{{$clientsDetails->middlename}}"
                           autofocus readonly>
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
                                  autofocus readonly>{{$clientsDetails->medicalhistory}}</textarea>
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
                           value="{{ $clientsDetails->drugofchoice }}"
                           required readonly>

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
                           value="{{ $clientsDetails->residence }}"
                           readonly>

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
                    <input id="contact" type="text" class="form-control" name="contact" value="{{ $clientsDetails->contact }}"
                           required readonly>

                    @if ($errors->has('contact'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    @can('clients.edit')
                        <a class="btn btn-warning" href="{{route('clients.edit',$clientsDetails->id)}}"> Edit</a>
                    @endcan
                    @can('clients.delete')
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                        Delete
                    </button>
                    @endcan
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal modal-danger fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Delete?</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to permanently delete  {!! $clientsDetails->firstname !!} {!! $clientsDetails->middlename !!} {!! $clientsDetails->lastname !!}?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onclick="event.preventDefault();">No</button>
                <button type="button" class="btn btn-outline" onclick="
                        document.getElementById('delete-client').submit();
                        ">Yes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
