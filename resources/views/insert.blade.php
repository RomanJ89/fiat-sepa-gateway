@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Create New SEPA Payment Request') }}</div>

        <div class="card-body">
            {!! Form::open(['url' => '/payments/initiate', 'class' => 'payment-form']) !!}
                
                <div class="form-group">
                    {!! Form::label('creditor_name', 'Creditor Name') !!}
                    {!! Form::text('creditor_name', null, ['class' => 'form-control', 'placeholder' => 'Recipient Name', 'required']) !!}
                </div>

                <div class="form-group mt-3">
                    {!! Form::label('iban', 'Creditor IBAN') !!}
                    {!! Form::text('iban', null, ['class' => 'form-control', 'placeholder' => 'e.g. DE89...', 'required']) !!}
                </div>

                <div class="form-group mt-3">
                    {!! Form::label('amount', 'Amount (EUR)') !!}
                    {!! Form::number('amount', null, ['class' => 'form-control', 'step' => '0.01', 'required']) !!}
                </div>

                <div class="form-group mt-3">
                    {!! Form::label('remittance_info', 'Remittance Information (Reference)') !!}
                    {!! Form::text('remittance_info', null, ['class' => 'form-control', 'placeholder' => 'Payment Purpose']) !!}
                </div>

                <div class="mt-4">
                    {!! Form::submit('Authorize Payment', ['class' => 'btn btn-primary']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
