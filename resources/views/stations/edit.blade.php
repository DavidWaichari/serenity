@extends('layouts.master')
@section('main-content')
@section('content-header')
    <h1>
        Edit Station
    </h1>
    <ol class="breadcrumb">
        <li>Edit a details of a station</li>
    </ol>
@endsection
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{!! route('stations.update',$editStation->id) !!}">
            {{ csrf_field() }}
            {!! method_field('PATCH') !!}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name"
                           value="{{ $editStation->name }}" required
                           autofocus>
                    @if ($errors->has('name'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
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
