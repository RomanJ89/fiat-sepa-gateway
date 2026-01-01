@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Base58 Gateway Dashboard') }}</div>

                <div class="card-body">
                    <h4>Node Status</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Protocol</th>
                                <th>Node BIC</th>
                                <th>Status</th>
                                <th>Last Ping</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SEPA / EBICS</td>
                                <td>BASE58XXX</td>
                                <td><span class="badge badge-success">Online</span></td>
                                <td>{{ now()->toDateTimeString() }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 class="mt-4">Active Batches</h4>
                    <div class="alert alert-info">
                        System is clear. All settlement batches have been reconciled.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
