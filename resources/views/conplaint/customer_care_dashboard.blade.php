<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Care Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Customer Care Dashboard</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>SPN</th>
                    <th>Complaint</th>
                    <th>Date of Complaint</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($complaints as $complaint)
                <tr>
                    <td>{{ $complaint->name }}</td>
                    <td>{{ $complaint->phone }}</td>
                    <td>{{ $complaint->location }}</td>
                    <td>{{ $complaint->spn }}</td>
                    <td>{{ $complaint->complaint }}</td>
                    <td>{{ $complaint->date_of_complaint }}</td>
                    <td>{{ ucfirst($complaint->status) }}</td>
                    <td>
                        <form action="{{ route('complaints.updateStatus', $complaint->id) }}" method="POST">
                            @csrf
                            <select name="status" class="form-select mb-2">
                                <option value="pending" @if($complaint->status == 'pending') selected @endif>Pending</option>
                                <option value="resolved" @if($complaint->status == 'resolved') selected @endif>Resolved</option>
                                <option value="unresolved" @if($complaint->status == 'unresolved') selected @endif>Unresolved</option>
                            </select>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                        
                        <!-- Form to forward complaint -->
                        <form action="{{ route('complaints.forward', $complaint->id) }}" method="POST" class="mt-2">
                            @csrf
                            <div class="mb-2">
                                <select name="user_id" class="form-select">
                                    <!-- Replace with dynamic list of users -->
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-secondary">Forward Complaint</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
