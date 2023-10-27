<div class="text-center shadow-lg flex">
    <div class="">
        <img src="{{ asset(Storage::url($product->images()->first()->name)) }}" class="w-full h-full rounded object-cover" alt="">
    </div>
    <div class="p-4 pt-2 flex h-full w-full">
        <div>
            <h4 class="mb-2 overflow-hidden">{{ $product->name }}</h4>
            <p class="mb-6 text-dark-grayish-blue">{{ $product->price }}</p>
            <p class="">quantity: {{ $quantity }}</p>
        </div>
        <div class="self-end justify-self-end">
            <a href="{{ route("product.show", ["product" => $product->id]) }}" class="bg-primary text-white py-2 px-3 rounded w-full">show</a>
            <a href="{{ route("cart.remove", ["product" => $product->id]) }}" class="bg-red-500 text-white py-2 px-3 rounded w-full ">remove</a>
        </div>
    </div>
</div>
