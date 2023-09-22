<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($cart as $id => $product)
    
        <pre>
                name: {{ $product["name"] }}
                quantity: => {{ $product["quantity"] }}
                price: => {{ $product["price"] }}
                total: => {{ $product["total"] }}
        </pre>
    @endforeach
    <form action="/cart/purchase/" method="post">
        @csrf
        <button>buy</button>
    </form>
</body>
</html>