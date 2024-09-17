@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Transaction</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('accounting.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="cashier_name">Cashier Name</label>
                            <input type="text" class="form-control" id="cashier_name" name="cashier_name" required>
                        </div>

                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="transaction_date">Transaction Date</label>
                            <input type="date" class="form-control" id="transaction_date" name="transaction_date" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
