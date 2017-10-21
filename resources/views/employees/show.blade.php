@extends('layouts.master')
@section('main-content')
@section('content-header')
    <h1>
        {!! $showEmployee->firstname !!} {!! $showEmployee->middlename !!} {!! $showEmployee->lastname !!}
    </h1>
    <ol class="breadcrumb">
        <li>{!! $showEmployee->firstname !!} {!! $showEmployee->middlename !!} {!! $showEmployee->lastname !!}</li>
    </ol>
@endsection
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" id="delete-employee" method="POST" action="{!! route('employees.destroy',$showEmployee->id) !!}">
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                <label for="lastname" class="col-md-4 control-label">Last Name</label>
                <div class="col-md-6">
                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $showEmployee->lastname}}" readonly
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
                    <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $showEmployee->firstname}}" readonly
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
                    <input id="middlename" type="text" class="form-control" name="middlename" value="{{ $showEmployee->middlename}}" readonly
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
                                   readonly
                                  autofocus>{{$showEmployee->jobdescription}}</textarea>
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
                    <input id="residence" type="text" class="form-control" name="residence" value="{{ $showEmployee->residence}}"
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
                    <input id="contact" type="text" class="form-control" name="contact" value="{{ $showEmployee->contact}}"
                           readonly>

                    @if ($errors->has('contact'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('contact') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <a class="btn btn-warning" href="{{route('employees.edit',$showEmployee->id)}}"> Edit</a>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                        Delete
                    </button>
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
                <p>Are you sure you want to permanently delete  {!! $showEmployee->firstname !!} {!! $showEmployee->middlename !!} {!! $showEmployee->lastname !!}?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onclick="event.preventDefault();">No</button>
                <button type="button" class="btn btn-outline" onclick="
                        event.preventDefault();
                        document.getElementById('delete-employee').submit();
                        ">Yes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
