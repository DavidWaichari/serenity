@extends('layouts.master')
@section('content-header')
    <h1>
        Admissions List
    </h1>
    <ol class="breadcrumb">
        <li>The list of admitted clients</li>
    </ol>
@endsection
@section('main-content')
    <div class="box">
        <div class="box-body">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('admissions.create')}}">Add New</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">S/N</th>
                    <th>Clients AdmNo</th>
                    <th>Clients Name</th>
                    <th>Sponsors Name</th>
                    <th>Station</th>
                    <th>Date Admitted</th>
                    <th>Expected Exit Date</th>
                    <th>Exit Date</th>
                    <th>Exit Comments</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($admissions as $admission)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td>{!! $admission->clientsadmn !!}</td>
                        <td>{!! $admission->clientsname !!}</td>
                        <td>{!! $admission->sponsorsname !!}</td>
                        <td>{!! $admission->station !!}</td>
                        <td>{!! $admission->created_at->toDateString() !!}</td>
                        <td>{!! $admission->expectedexitdate !!}</td>
                        <td> {!! $admission->exitdate !!}</td>
                        <td> {!! $admission->exitcomments !!}</td>
                        <td class="text-center">
                            <a href="{{ route('admissions.edit',$admission->id) }}"><span class="glyphicon glyphicon-edit" style="margin-right: 8px;"></span></a>
                            <a data-toggle="modal" data-target="#modal-danger-{{$admission->id}}"><span class="glyphicon glyphicon-trash"></span></a>
                            <div class="modal modal-danger fade" id="modal-danger-{{$admission->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to permanently delete the admission of {!! $admission->clientsname !!}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onclick="event.preventDefault();">No</button>
                                            <button type="button" class="btn btn-outline" onclick="
                                                    document.getElementById('delete-form-{{ $admission->id }}').submit();
                                                    ">Yes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                                <form id="delete-form-{{ $admission->id }}" method="post"
                                      action="{{ route('admissions.destroy',$admission->id) }}" style="display: none">
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
                    <th>Clients AdmNo</th>
                    <th>Clients Name</th>
                    <th>Sponsors Name</th>
                    <th>Station</th>
                    <th>Date Admitted</th>
                    <th>Expected Exit Date</th>
                    <th>Exit Date</th>
                    <th>Exit Comments</th>
                    <th class="text-center">Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
