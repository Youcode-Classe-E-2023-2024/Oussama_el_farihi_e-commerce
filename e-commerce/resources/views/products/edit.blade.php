<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit product</title>
</head>

<body>
    <h1>edit product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li></li>
            @endforeach
        </ul>
        @endif
    </div>
    <form method="POST" action="{{ route('product.update', ['product' => $product]) }}">
        @csrf
        @method('PUT')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="Name" value="{{$product -> name}}">
        </div>
        <div>
            <label>Qty</label>
            <input type="text" name="qty" placeholder="Qty" value="{{$product -> qty}}">
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="Price" value="{{$product -> price}}">
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" placeholder="Description" value="{{$product -> description}}">
        </div>
        <div>
            <input type="submit" name="submit" value="update">
        </div>
    </form>
</body>

</html>