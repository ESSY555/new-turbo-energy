

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <!-- resources/views/components/form.blade.php -->
<form  class="space-y-4">
    @csrf
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
        <input type="text" name="name" id="name" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" id="email" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
    </div>
    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
    </div>
    <div>
        <button type="submit" class="px-4 py-2 bg-orange-600 text-white rounded-md hover:bg-orange-700">Submit</button>
    </div>
</form>

</body>
</html>
