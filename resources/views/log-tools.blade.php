@extends('layouts.basic')

@section('title', 'Log Tools')

@section('body')
<div class="container">
    <div class="card">
        <div class="card-header">
            MongoDB Syntax Generator
        </div>
        <div class="card-body">
            <form method="POST" action="">
                @csrf

                <div class="form-group row">
                    <label for="logType" class="col-md-4 col-form-label text-md-right">{{ __('Log Type') }}</label>

                    <div class="col-md-6">
                        <select class="form-control form-control-sm" id="logType" name="logType" autofocus>
                            <option>Invoice_B2C</option>
                            <option>Invoice_B2B</option>
                            <option>Invoice_MultimediaPrint</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="startDate" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                    <div class="col-md-6">
                        <input id="startDate" type="text" class="form-control form-control-sm" name="startDate" value="{{ old('startDate') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="endDate" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                    <div class="col-md-6">
                        <input id="endDate" type="text" class="form-control form-control-sm" name="endDate" value="{{ old('endDate') }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="logData" class="col-md-4 col-form-label text-md-right">{{ __('Log Data') }}</label>

                    <div class="col-md-6">
                        <input id="logData" type="text" class="form-control form-control-sm" name="logData" value="{{ old('logData') }}">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Generate') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection