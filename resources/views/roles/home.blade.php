@extends('layouts.master')
@section('content-header')
    <h1>
        <i class="fa fa-key"></i> Roles
    </h1>
    <ol class="breadcrumb">
        <li>Roles available in the system</li>
    </ol>
@endsection
@section('main-content')
    <div class="box">
        <div class="box-body">
            <div class="pull-right">
            <a class="btn btn-primary" href="{{route('users.index')}}">Users</a>
            <a class="btn btn-primary" href="{{route('permissions.index')}}">Permissions</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">S/N</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Date Added</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td>{!! $role->name !!}</td>
                        <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>
                        <td>{!! $role->created_at->toDateString() !!}</td>
                        <td>
                            <a href="{{ route('roles.edit',$role->id) }}"><span class="glyphicon glyphicon-edit" style="margin-right: 8px;"></span></a>
                            <a data-toggle="modal" data-target="#modal-danger-{{$role->id}}"><span class="glyphicon glyphicon-trash"></span></a>
                            <div class="modal modal-danger fade" id="modal-danger-{{$role->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to permanently delete the role of the {!! $role->name !!}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onclick="event.preventDefault();">No</button>
                                            <button type="button" class="btn btn-outline" onclick="
                                                    document.getElementById('delete-form-{{ $role->id }}').submit();
                                                    ">Yes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                                <form id="delete-form-{{ $role->id }}" method="post"
                                      action="{{ route('roles.destroy',$role->id) }}" style="display: none">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-center">S/N</th>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Date Added</th>
                    <th class="text-center">Action</th>
                </tr>
                </tfoot>
            </table>
            <span class="col-md-offset-5"><a class="btn btn-info" href="{{route('roles.create')}}">Add Role</a></span>
        </div>
    </div>
@endsection

