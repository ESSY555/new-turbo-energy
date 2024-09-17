@extends('layouts.auth')

@section('content')
<div class="container mt-5" style="height: 100vh">
    <h2 class="text-center mb-4">Inbox</h2>

    @if($notifications->isEmpty())
        <div class="alert alert-info text-center" role="alert">
            No new notifications.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Amount</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notifications as $notification)
                        <tr>
                            <td>{{ $notification->data['amount'] }}</td>
                            <td>{{ $notification->data['description'] }}</td>
                            <td>{{ $notification->data['transaction_date'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
