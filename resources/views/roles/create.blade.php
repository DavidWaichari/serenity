@extends('layouts.master')
@section('content-header')
    <h1>
        <h1><i class='fa fa-key'></i> Add Role</h1>
    </h1>
    <ol class="breadcrumb">
        <li>Create a role</li>
    </ol>
@endsection
@section('main-content')
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6 col-md-offset-4">
                {{ Form::open(array('url' => 'roles')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Role Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Assign Permissions</b></h5>

                <div class='form-group'>
                    @foreach ($permissions as $permission)
                        {{ Form::checkbox('permissions[]',  $permission->id ) }}
                        {{ Form::label($permission->name,($permission->name)) }}<br>

                    @endforeach
                </div>

                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
                </div>
            </div>
        </div>
@endsection