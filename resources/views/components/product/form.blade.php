@if ($role === "admin")
    {{-- <form action="{{ route("product.buy") }}">
        <button>update</button>
    </form> --}}
    @else
    <form action="{{ route("product.update", ["product" => $product->id  ]) }}" 
        class="flex w-full justify-between">
        <div class="flex mr-14">
            <button id="remove" type="button" class="bg-light-grayish-blue font-bold py-3 px-4 text-primary">-</button>
            <p class="bg-light-grayish-blue font-bold py-3 px-4 " id="quantity">1</p>
            <button id="add" type="button" class="bg-light-grayish-blue font-bold py-3 px-4 text-primary">+</button>
        </div>
        <input type="hidden" max="{{ $product->quantity }}" min="1">
        <button class="bg-primary text-white rounded py-2 px-4 w-full">Add to cart</button>
    </form>
@endif