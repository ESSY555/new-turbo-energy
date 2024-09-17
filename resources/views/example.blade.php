<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Forms Example</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="p-6">
    <h1 class="text-2xl font-bold mb-4">Multiple Forms</h1>

    <x-form action="{{ route('form') }}" method="POST" />
</body>
</html>
