@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Register New Financial Node') }}</div>

        <div class="card-body">
            <h5 class="mb-4">Configure Upstream Banking Gateway</h5>
            
            {!! Form::open(['url' => '/system/nodes/register', 'method' => 'POST']) !!}
                
                <div class="form-group">
                    {!! Form::label('node_name', 'Financial Institution Name (BIC)') !!}
                    {!! Form::text('node_name', null, ['class' => 'form-control', 'placeholder' => 'e.g. DEUTDEBBXXX', 'required']) !!}
                </div>

                <div class="form-group mt-3">
                    {!! Form::label('protocol', 'Communication Protocol') !!}
                    {!! Form::select('protocol', ['EBICS' => 'EBICS 3.0', 'SWIFT' => 'SWIFT gpi', 'AS2' => 'AS2 (Direct)'], null, ['class' => 'form-control']) !!}
                </div>

                <div class="mt-4">
                    {!! Form::submit('Provision Node', ['class' => 'btn btn-success']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
