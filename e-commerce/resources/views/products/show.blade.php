<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-image {
            max-height: 400px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">{{ $product->name }}</h1>
            </div>
            <div class="card-body">
                <img src="{{ asset('images/' . $product->image) }}" alt="Product Image" class="product-image img-fluid mb-3">
                <p class="card-text"><strong>Created at:</strong> {{ $product->created_at->format('M d, Y') }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $product->description }}</p>
                <p class="card-text"><strong>Quantity:</strong> {{ $product->qty }}</p>
                <p class="card-text"><strong>Price:</strong> {{ $product->price }} Dh</p>
                <!-- Back Button -->
                <a href="{{ route('product.index') }}" class="btn btn-secondary mt-3">Go back</a>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>