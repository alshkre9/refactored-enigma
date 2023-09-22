<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/products/store/" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="number" name="price" placeholder="price">
        <input type="file" name="image", placeholder="image">
        <input type="number" name="quantity" placeholder="quantity">
        <input type="text" name="description" placeholder="description">
        <button type="submit">submit</button>
    </form>
</body>
</html>