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
</body>

</html>
