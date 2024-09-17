<!-- resources/views/cashier/transactions.blade.php -->

@extends('layouts.auth') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Transactions</div>
                <div class="card-body">
                    @foreach ($transactions as $transaction)
                        <div class="mb-3">
                            <h5>Transaction ID: {{ $transaction->id }}</h5>
                            <p>Cashier Name: {{ $transaction->cashier->name }}</p>
                            <p>Amount: {{ $transaction->amount }}</p>
                            <p>Description: {{ $transaction->description ?: 'N/A' }}</p>
                            <p>Transaction Date: {{ $transaction->transaction_date }}</p>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
