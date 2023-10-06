<form action="{{ route("cart.add", ["product" => $product->id  ]) }}" class="w-full" method="post">
    @csrf
    <input id="max" type="hidden"  value="{{ $product->quantity }}">
    <input id="quantity" type="hidden" value="1"  name="quantity">
    {{ $slot }}
</form>