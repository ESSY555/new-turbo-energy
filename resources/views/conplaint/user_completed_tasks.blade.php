<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Completed Tasks</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>SPN</th>
                    <th>Complaint</th>
                    <th>Date of Complaint</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
