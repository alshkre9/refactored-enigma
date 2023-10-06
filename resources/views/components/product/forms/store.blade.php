<form action="{{ route('product.store') }}" id="theForm" method="POST" class="w-full">
    @csrf
    <input id="image" name="image" type="hidden" value="">
    <input id="name" name="name" type="hidden" value="">
    <input id="description" name="description" type="hidden"  value="">
    <input id="price" name="price" type="hidden" value="">
    <input id="quantity" name="quantity" type="hidden" value="1">
    <input id="max" type="hidden" value="">
    {{ $slot }}
</form>
