<form action="{{ route('product.update', ['product' => $product->id]) }}" id="theForm" method="POST" class="w-full">
    @csrf
    @method("put")
    <input id="image" name="image" type="hidden" value="{{ $product->images()->first()->name }}">
    <input id="name" name="name" type="hidden" value="">
    <input id="description" name="description" type="hidden"  value="">
    <input id="price" name="price" type="hidden" value="">
    <input id="quantity" name="quantity" type="hidden" value="{{ $product->quantity }}">
    <input id="max" type="hidden" value="">
    {{ $slot }}
</form>
