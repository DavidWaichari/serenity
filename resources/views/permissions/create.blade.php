@extends('layouts.master')
@section('content-header')
    <h1>
        Create Permission
    </h1>
    <ol class="breadcrumb">
        <li>Create Permission</li>
    </ol>
@endsection
@section('main-content')
        <div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
    <div class="panel-body">
        <h1><i class='fa fa-key'></i> Add Permission</h1>
        <br>

        {{ Form::open(array('url' => 'permissions')) }}

        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', '', array('class' => 'form-control')) }}
        </div><br>
        @if(!$roles->isEmpty())
        <h4>Assign Permission to Roles</h4>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
        @endif
        @if($roles->isEmpty())
            <p class="text-danger">You need to add a role first</p>
        @endif
        <br>
        {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

        {{ Form::close() }}

    </div>
</div>
</div>
@endsection