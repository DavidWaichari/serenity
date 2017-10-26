@extends('layouts.master')
@section('main-content')
@section('content-header')
    <h1>
       {!! $stationDetails->name !!}
    </h1>
    <ol class="breadcrumb">
        <li> Details of {!! $stationDetails->name !!}</li>
    </ol>
@endsection
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" id="delete-station" method="POST" action="{!! route('clients.destroy',$clientsDetails->id) !!}">
            {{ csrf_field() }}
            {{method_field('DELETE')}}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ $clientsDetails->name }}"
                           autofocus readonly>
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    @can('stations.edit')
                        <a class="btn btn-warning" href="{{route('stations.edit',$stationDetails->id)}}"> Edit</a>
                    @endcan
                    @can('stations.delete')
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
                <p>Are you sure you want to permanently delete  {!! $clientsDetails->name !!}?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onclick="event.preventDefault();">No</button>
                <button type="button" class="btn btn-outline" onclick="
                        document.getElementById('delete-station').submit();
                        ">Yes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
