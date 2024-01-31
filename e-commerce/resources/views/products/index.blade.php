<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Index</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .sort-links a {
            margin-right: 10px;
            text-decoration: none;
            color: #007bff;
        }
        .sort-links a:hover {
            text-decoration: underline;
        }
        .card-img-top {
            height: 200px; /* Fixed height */
            object-fit: cover; /* Keeps aspect ratio */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Product Index</h1>
            <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
        </div>
        
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="sort-links mb-3">
            <a href="{{ route('product.index', ['sort' => 'name']) }}">Sort Alphabetically</a>
            <a href="{{ route('product.index', ['sort' => 'created_at']) }}">Sort by Date</a>
        </div>

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('images/' . $product->image) }}" class="card-img-top" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 30) }}</p>
                            <p class="card-text">Quantity: {{ $product->qty }}</p>
                            <p class="card-text">Price: {{ $product->price }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <a href="{{ route('product.show', ['product' => $product]) }}" class="btn btn-secondary btn-sm">View</a>
                                <form action="{{ route('product.delete', ['product' => $product]) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $products->appends(['sort' => request('sort')])->links('products.custom') }}
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
