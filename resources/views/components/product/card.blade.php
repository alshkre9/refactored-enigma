<div class="text-center shadow-lg flex flex-col">
    <div class="">
        <img src="{{ asset(Storage::url($product->images()->first()->name)) }}" class="w-full h-full rounded object-cover" alt="">
    </div>
    <div class="p-4 pt-2 h-full flex flex-col justify-between">
        <h4 class="mb-2 overflow-hidden">{{ $product->name }}</h4>
        <p class="mb-6 text-dark-grayish-blue">{{ $product->price }}</p>
        <a href="{{ route("product.show", ["product" => $product->id]) }}" class="bg-primary text-white py-2 px-3 rounded w-full ">show</a>
    </div>
</div>


