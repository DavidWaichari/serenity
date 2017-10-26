{{-- \resources\views\users\index.blade.php --}}
@extends('layouts.master')
@section('content-header')
    <h1>
        <i class="fa fa-users"></i> User Administration
    </h1>
    <ol class="breadcrumb">
        <li>Users of the system</li>
    </ol>
@endsection
@section('main-content')
    <div class="box">
        <div class="box-body">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('roles.index')}}">Roles</a>
                <a class="btn btn-primary" href="{{route('permissions.index')}}">Permissions</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">

                <thead>
                <tr>
                    <th class="text-center">S/N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Station</th>
                    <th>Contact</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->station }}</td>
                        <td>{{ $user->contact }}</td>
                        <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                        <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                        <td>
                            <a href="{{ route('users.edit',$user->id) }}"><span class="glyphicon glyphicon-edit" style="margin-right: 8px;"></span></a>
                            <a data-toggle="modal" data-target="#modal-danger-{{$user->id}}"><span class="glyphicon glyphicon-trash"></span></a>
                            <div class="modal modal-danger fade" id="modal-danger-{{$user->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to permanently delete {!! $user->name !!}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onclick="event.preventDefault();">No</button>
                                            <button type="button" class="btn btn-outline" onclick="
                                                    document.getElementById('delete-form-{{ $user->id }}').submit();
                                                    ">Yes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                                <form id="delete-form-{{ $user->id }}" method="post"
                                      action="{{ route('users.destroy',$user->id) }}" style="display: none">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>

    </div>
    </div>

@endsection