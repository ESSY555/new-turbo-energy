@extends('layouts.auth')

@section('content')

@extends('layouts.auth')

@section('content')

<div class="" style="background-color: white; height:100vh; margin-top:20px">
    <form action="{{ route('funding_requests.store') }}" method="POST" class="col-md-8 mx-auto mt-5">
        @csrf
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="text" id="amount" name="amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" id="location" name="location" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="reason" class="form-label">Reason for Funding</label>
            <textarea id="reason" name="reason" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="initial_funding" class="form-label">Initial Funding</label>
            <input type="text" id="initial_funding" name="initial_funding" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="current_balance" class="form-label">Current Balance</label>
            <input type="text" id="current_balance" name="current_balance" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" id="time" name="time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="mt-3">
        <a href="{{ route('cashier.inbox') }}" class="btn btn-secondary">View Inbox</a>
    </div>
</div>

@endsection



@endsection
