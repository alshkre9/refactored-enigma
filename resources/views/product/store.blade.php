<x-app-layout>
    <form action="/products/store/" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="name">
        @isset($error)
            <x-input-error :messages="$error"/>
        @endisset
        <input type="number" name="price" placeholder="price">
        <input type="file" name="image", placeholder="image">
        <input type="number" name="quantity" placeholder="quantity">
        <input type="text" name="description" placeholder="description">
        <button type="submit">submit</button>
    </form>


</x-app-layout>