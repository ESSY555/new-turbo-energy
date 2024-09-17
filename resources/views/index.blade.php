<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Datatable</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <div class="bg-white p-4 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-4">Products</h1>
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b border-gray-200">ID</th>
                        <th class="py-2 px-4 border-b border-gray-200">Name</th>
                        <th class="py-2 px-4 border-b border-gray-200">Description</th>
                        <th class="py-2 px-4 border-b border-gray-200">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $product->id }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $product->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $product->description }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $product->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</body>
</html>
