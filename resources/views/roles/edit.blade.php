@extends('layouts.master')
@section('content-header')
    <h1>
        <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
    </h1>
    <ol class="breadcrumb">
        <li>Edit a role</li>
    </ol>
@endsection
@section('main-content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6 col-md-offset-4">
                {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Role Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Assign Permissions</b></h5>
                @foreach ($permissions as $permission)

                    {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                    {{Form::label($permission->name, ($permission->name)) }}<br>

                @endforeach
                <br>
                {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection