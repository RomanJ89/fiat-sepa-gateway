@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">{{ __('Transaction Audit Trail') }}</div>

        <div class="card-body">
            <h3>Transaction Ref: {{ $transaction->reference }}</h3>
            <hr>
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <h5>Status History</h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Authorized
                            <span class="badge badge-success badge-pill">Success</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            SEPA Clearing
                            <span class="badge badge-primary badge-pill">Processing</span>
                        </li>
                    </ul>
                </div>
                
                <div class="col-md-6">
                    <h5>Technical Metadata</h5>
                    <pre class="bg-light p-3">
{
  "protocol": "EBICS 3.0",
  "priority": "HIGH",
  "settlement_window": "NEXT_DAY"
}
                    </pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
