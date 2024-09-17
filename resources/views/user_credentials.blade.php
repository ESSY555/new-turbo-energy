<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Credentials</title>
</head>
<body>
    <p>Hello {{ $name }},</p>
    <p>Your account has been created successfully. Here are your credentials:</p>
    <p>Email: {{ $email }}</p>
    <p>Password: {{ $password }}</p>
    <p>Please keep this information secure.</p>
</body>
</html>
