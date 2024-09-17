<!-- resources/views/complaints/unresolved_cases.blade.php -->

@extends('layouts.auth')

@section('content')
    <div class="container mt-5">
        <h2>Unresolved Cases</h2>

        @if($complaints->isEmpty())
            <p>No unresolved cases at the moment.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>SPN</th>
                        <th>Email</th>
                        <th>Date of Complaint</th>
                        <th>Complaint</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($complaints as $complaint)
                        <tr>
                            <td>{{ $complaint->name }}</td>
                            <td>{{ $complaint->phone }}</td>
                            <td>{{ $complaint->location }}</td>
                            <td>{{ $complaint->spn }}</td>
                            <td>{{ $complaint->email }}</td>
                            <td>{{ $complaint->date_of_complaint->format('Y-m-d') }}</td>
                            <td>{{ $complaint->complaint }}</td>
                            <td>{{ ucfirst($complaint->status) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
