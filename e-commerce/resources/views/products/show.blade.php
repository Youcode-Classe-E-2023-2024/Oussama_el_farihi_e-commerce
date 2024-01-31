<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>{{ $product->name }}</h1>
        <img src="{{ asset('images/' . $product->image) }}" alt="Product Image">
        <p>Created_at: {{ $product->created_at }}</p>
        <p>Description: {{ $product->description }}</p>
        <p>Quantity: {{ $product->qty }}</p>
        <p>Price: {{ $product->price }}</p>
    </div>
</body>
</html>