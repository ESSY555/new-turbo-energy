<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>States</title>
</head>
<body>
    <h1>States of Nigeria</h1>
    <ul>
        @foreach ($states as $state)
            <li>{{ $state->name }}</li>
        @endforeach
    </ul>
</body>
</html>


 