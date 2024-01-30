<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create product</title>
</head>

<body>
    <h1>create product</h1>
    <form method="post" action="{{ route('product.store') }}">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name">
        </div>
        <div>
            <label>Qty</label>
            <input type="text" name="qty" placeholder="Qty">
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="Price">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description">
        </div>
        <div>
            <input type="submit" name="submit" value="submit">
        </div>
    </form>
</body>
</html>