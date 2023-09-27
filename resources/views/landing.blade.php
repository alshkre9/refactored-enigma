<x-app-layout>
    @foreach ($products as $product)
    <pre>
        id: {{$product->id}}
        name: {{$product->name}}
        image: {{$product->image}}
        quantity: {{$product->quantity}}
        description: {{$product->description}}
        <a href="{{ route("product.show", ["product" => $product->id ]) }}">{{$product->name}}</a>
    </pre>
    @endforeach
</x-app-layout>