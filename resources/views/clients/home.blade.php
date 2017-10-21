@extends('layouts.master')
@section('content-header')
    <h1>
        Clients
    </h1>
    <ol class="breadcrumb">
        <li>Clients</li>
    </ol>
@endsection
@section('main-content')
    <div class="box">
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">S/N</th>
                    <th>Adm No</th>
                    <th>Name</th>
                    <th>Drug of Choice</th>
                    <th>Contact</th>
                    <th>Residence</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td>{!! $client->admno !!}</td>
                        <td>{!! $client->firstname !!} {!! $client->middlename !!} {!! $client->lastname !!}</td>
                        <td>{!! $client->drugofchoice !!}</td>
                        <td>{!! $client->contact !!}</td>
                        <td> {!! $client->residence !!}</td>
                        <td>{!! $client->created_at->toDateString() !!}</td>
                        <td><a class="btn btn-primary btn-xs"
                               href="{!! route('clients.show',$client->id) !!}">Manage</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-center">S/N</th>
                    <th>Adm No</th>
                    <th>Name</th>
                    <th>Drug of Choice</th>
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
