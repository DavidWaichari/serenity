@extends('layouts.master')
@section('content-header')
    <h1>
        Employees
    </h1>
    <ol class="breadcrumb">
        <li>Employees</li>
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
                    <th>Job Description</th>
                    <th>Residence</th>
                    <th>Contact</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td>{!! $employee->firstname !!} {!! $employee->middlename !!} {!! $employee->lastname !!}</td>
                        <td>{!! $employee->jobdescription !!}</td>
                        <td> {!! $employee->residence !!}</td>
                        <td>{!! $employee->contact !!}</td>
                        <td>{!! $employee->created_at->toDateString() !!}</td>
                        <td><a class="btn btn-primary btn-xs"
                               href="{!! route('employees.show',$employee->id) !!}">Manage</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-center">S/N</th>
                    <th>Name</th>
                    <th>Job Description</th>
                    <th>Residence</th>
                    <th>Contact</th>
                    <th>Date Added</th>
                    <th>Action</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
