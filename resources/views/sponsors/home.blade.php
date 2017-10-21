@extends('layouts.master')
@section('content-header')
    <h1>
        Sponsors
    </h1>
    <ol class="breadcrumb">
        <li>Sponsors</li>
    </ol>
@endsection
@section('main-content')
    <div class="box">
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">S/N</th>
                    <th>Name</th>
                    <th>ID Number</th>
                    <th>Contact</th>
                    <th>Residence</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sponsors as $sponsor)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td>{!! $sponsor->firstname !!} {!! $sponsor->middlename !!} {!! $sponsor->lastname !!}</td>
                        <td>{!! $sponsor->idnumber !!}</td>
                        <td>{!! $sponsor->contact !!}</td>
                        <td> {!! $sponsor->residence !!}</td>
                        <td>{!! $sponsor->created_at->toDateString() !!}</td>
                        <td><a class="btn btn-primary btn-xs"
                               href="{!! route('sponsors.show',$sponsor->id) !!}">Manage</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-center">S/N</th>
                    <th>Name</th>
                    <th>ID Number</th>
                    <th>Contact</th>
                    <th>Residence</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
