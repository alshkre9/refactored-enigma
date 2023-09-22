<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($cart as $product)
    
        <pre>
                name: {{ $product[0]->name }}
                quantity: => {{ $product[1] }}
                price: => {{ $product[0]->price }}
                description: {{ $product[0]->description }}
        </pre>
    @endforeach
    <form action="/cart/purchase/" method="post">
        @csrf
        <button>buy</button>
    </form>
</body>
</html>