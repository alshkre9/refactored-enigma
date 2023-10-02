<div class="text-center shadow-lg">
    <div class="">
        <img src="{{ asset(Storage::url($product->image) )}}" class="w-full h-full rounded object-cover" alt="">
    </div>
    <div class="p-4 pt-2">
        <h4 class="mb-2">{{ $product->name }}</h4>
        <p class="mb-6 text-dark-grayish-blue">{{ $product->price }}</p>
        {{-- <a href="{{ route("product.show", ["product" => $product->id]) }}"
            class="bg-primary text-white py-2 px-3 rounded w-full ">show</a> --}}
    </div>
</div>


