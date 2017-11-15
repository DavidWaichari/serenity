@extends('layouts.master')
@section('main-content')
@section('content-header')
    <h1>
        New Financial Entry
    </h1>
    <ol class="breadcrumb">
        <li>Add a new financial entry for a client</li>
    </ol>
@endsection
<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <form class="form-horizontal" method="POST" action="{!! route('financials.store') !!}">
                {!! csrf_field() !!}
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('financialclientsadmn') ? ' has-error' : '' }}">
                        <label for="financialclientsadmn" class="control-label" style="margin-left: 10px;">Admission Number</label>
                        <div class=" col-md-9 pull-right">
                            <select required class="form-control" name="financialclientsadmn" id="financialclientsadmn">
                                <option>Select Admission Number</option>
                                @foreach($admissions as $admission)
                                    <option value="{{$admission->clientsadmn}}">{!! $admission->clientsadmn !!}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('financialclientsadmn'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('financialclientsadmn') }}</strong>
                                    </span>
                            @endif
                    </div>
                    </div>
                    <div class="form-group{{ $errors->has('financialclientsname') ? ' has-error' : '' }}">
                        <label for="financialclientsname" class="control-label" style="margin-left: 10px;">Clients Name</label>
                        <div class=" col-md-9 pull-right">
                            <input id="financialclientsname" type="text" class="form-control"
                                   name="financialclientsname"
                                   value="" readonly
                                   autofocus>
                            @if ($errors->has('financialclientsname'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('financialclientsname') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('financialsponsorsidnumber') ? ' has-error' : '' }}">
                        <label for="financialsponsorsidnumber" class="control-label" style="margin-left: 10px;">Sponsors ID Number</label>
                        <div class=" col-md-9 pull-right">
                            <input id="financialsponsorsidnumber" type="text" class="form-control"
                                   name="financialsponsorsidnumber"
                                   value="{{ old('financialsponsorsidnumber') }}"
                                   autofocus readonly>
                            @if ($errors->has('financialsponsorsidnumber'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('financialsponsorsidnumber') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('financialsponsorsname') ? ' has-error' : '' }}">
                        <label for="financialsponsorsname" class="control-label" style="margin-left: 10px;">Sponsors Name</label>

                        <div class=" col-md-9 pull-right">
                            <input id="financialsponsorsname" type="text" class="form-control"
                                   name="financialsponsorsname"
                                   value="{{ old('financialsponsorsname') }}"
                                   autofocus readonly>
                            @if ($errors->has('financialsponsorsname'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('financialsponsorsname') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('fincialstation') ? ' has-error' : '' }}">
                        <label for="fincialstation" class="control-label" style="margin-left: 10px;">Station</label>

                        <div class=" col-md-9 pull-right">
                            <input id="fincialstation" type="text" class="form-control" name="fincialstation"
                                   value="{{ old('fincialstation') }}"
                                   autofocus readonly>
                            @if ($errors->has('fincialstation'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('fincialstation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('rehabfee') ? ' has-error' : '' }}">
                        <label for="rehabfee" class="control-label" style="margin-left: 10px;">Rehab Fee</label>
                        <div class=" col-md-9 pull-right">
                            <input id="rehabfee" type="number" class="form-control"
                                   name="rehabfee"
                                   value=""
                                   autofocus>
                            @if ($errors->has('rehabfee'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('rehabfee') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('psychiatristfee') ? ' has-error' : '' }}">
                        <label for="psychiatristfee" class="control-label" style="margin-left: 10px;">Psychiatrist Fee</label>

                        <div class=" col-md-9 pull-right">
                            <input id="psychiatristfee" type="number" class="form-control"
                                   name="psychiatristfee"
                                   value="{{ old('psychiatristfee') }}"
                                   autofocus >
                            @if ($errors->has('psychiatristfee'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('psychiatristfee') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('screeningfee') ? ' has-error' : '' }}">
                        <label for="screeningfee" class="control-label" style="margin-left: 10px;">Screening Fee</label>
                        <div class=" col-md-9 pull-right">
                            <input id="screeningfee" type="number" class="form-control" name="screeningfee"
                                   value="{{ old('screeningfee') }}"
                                   autofocus >
                            @if ($errors->has('screeningfee'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('screeningfee') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('nursefee') ? ' has-error' : '' }}">
                        <label for="nursefee" class="control-label" style="margin-left: 10px;">Nurse Fee</label>
                        <div class=" col-md-9 pull-right">
                            <input id="nursefee" type="number" class="form-control" name="nursefee"
                                   value="{{ old('nursefee') }}"
                                   autofocus >
                            @if ($errors->has('nursefee'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('nursefee') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('medicalexpenses') ? ' has-error' : '' }}">
                        <label for="medicalexpenses" class="control-label" style="margin-left: 10px;">Mediacal Expenses</label>
                        <div class=" col-md-9 pull-right">
                            <input id="medicalexpenses" type="number" class="form-control" name="medicalexpenses"
                                   value="{{ old('medicalexpenses') }}"
                                   autofocus >
                            @if ($errors->has('medicalexpenses'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('medicalexpenses') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-6">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
