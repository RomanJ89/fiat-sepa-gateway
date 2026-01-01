@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Modify Pending Transaction') }}</div>

        <div class="card-body">
            {!! Form::open(['url' => '/settlement/update', 'method' => 'POST']) !!}
                
                <div class="form-group">
                    {!! Form::label('reference', 'Transaction Reference (End-to-End ID)') !!}
                    {!! Form::text('reference', $transaction['ref'], ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group mt-3">
                    {!! Form::label('beneficiary', 'Beneficiary Name') !!}
                    {!! Form::text('beneficiary', $transaction['name'], ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group mt-3">
                    {!! Form::label('priority', 'Settlement Priority') !!}
                    {!! Form::select('priority', ['HIGH' => 'High (SLA 1h)', 'NORMAL' => 'Normal', 'LOW' => 'Batch (24h)'], $transaction['priority'], ['class' => 'form-control']) !!}
                </div>

                <div class="mt-4">
                    {!! Form::submit('Update Transaction Details', ['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
