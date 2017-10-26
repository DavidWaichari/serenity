{{-- \resources\views\permissions\index.blade.php --}}
@extends('layouts.master')
@section('content-header')
    <h1>
        <i class="fa fa-key"></i> Permissions
    </h1>
    <ol class="breadcrumb">
        <li>Permissions</li>
    </ol>
@endsection
@section('main-content')
    <div class="box">
        <div class="box-body">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('roles.index')}}">Roles</a>
                <a class="btn btn-primary" href="{{route('users.index')}}">Users</a>
            </div>
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th class="text-center">S/N</th>
                                <th>Permissions</th>
                                <th>Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td class="text-center">{{ $loop->index + 1 }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <a href="{{ route('permissions.edit',$permission->id) }}"><span class="glyphicon glyphicon-edit" style="margin-right: 8px;"></span></a>
                                        <a data-toggle="modal" data-target="#modal-danger-{{$permission->id}}"><span class="glyphicon glyphicon-trash"></span></a>
                                        <div class="modal modal-danger fade" id="modal-danger-{{$permission->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Delete?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to permanently delete {!! $permission->name !!} permission?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onclick="event.preventDefault();">No</button>
                                                        <button type="button" class="btn btn-outline" onclick="
                                                                document.getElementById('delete-form-{{ $permission->id }}').submit();
                                                                ">Yes</button>
                                                    </div>
                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                            <form id="delete-form-{{ $permission->id }}" method="post"
                                                  action="{{ route('permissions.destroy',$permission->id) }}" style="display: none">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

        </div>
    </div>
@endsection