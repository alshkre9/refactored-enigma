<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    name: {{ $name }}
    <br>
    price" {{ $price }}
    <br>
    image: <img src="{{ $image }}" alt="">
    <br>
    quantity: {{ $quantity }}
    <br>
    description: {{ $description }}
    <form action="/products/delete/{{$id}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <button type="submit">delete</button>
    </form>
    <form action="/cart/store/{{$id}}" method="POST">
        @csrf
        <input type="number" value="10" name="quantity" min="1" max="{{ $max }}">
        <button type="submit">add to cart</button>
    </form>
</body>

</html>
