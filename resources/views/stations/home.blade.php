@extends('layouts.master')
@section('content-header')
    <h1>
        Stations
    </h1>
    <ol class="breadcrumb">
        <li>Stations available in the system</li>
    </ol>
@endsection
@section('main-content')
    <div class="box">
        <div class="box-body">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('stations.create')}}">Add New</a>
            </div>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">S/N</th>
                    <th>Station Name</th>
                    <th>Date Added</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($stations as $station)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td>{!! $station->name !!}</td>
                        <td>{!! $station->created_at->toDateString() !!}</td>
                        <td class="text-center">
                            <a href="{{ route('stations.edit',$station->id) }}"><span class="glyphicon glyphicon-edit" style="margin-right: 8px;"></span></a>
                            <a data-toggle="modal" data-target="#modal-danger-{{$station->id}}"><span class="glyphicon glyphicon-trash"></span></a>
                            <div class="modal modal-danger fade" id="modal-danger-{{$station->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are you sure you want to permanently delete {!! $station->name !!}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal" onclick="event.preventDefault();">No</button>
                                            <button type="button" class="btn btn-outline" onclick="
                                                    document.getElementById('delete-form-{{ $station->id }}').submit();
                                                    ">Yes</button>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                                <form id="delete-form-{{ $station->id }}" method="post"
                                      action="{{ route('stations.destroy',$station->id) }}" style="display: none">
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
                    <th>Station Name</th>
                    <th>Date Added</th>
                    <th class="text-center">Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
