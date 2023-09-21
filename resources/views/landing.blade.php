<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach ($products as $product)
    <pre>
        id: {{$product->id}}
        name: {{$product->name}}
        image: {{$product->image}}
        quantity: {{$product->quantity}}
        description: {{$product->description}}
        <a href="products/show/{{$product->id}}">{{$product->name}}</a>
    </pre>
    @endforeach
</body>
</html>