@if ($role === "admin")
    {{-- <form action="{{ route("product.buy") }}">
        <button>update</button>
    </form> --}}
    @else
    <form action="{{ route("cart.add", ["product" => $product->id  ]) }}"
        class="flex w-full justify-between" method="post">
        @csrf
        <div class="flex mr-14 rounded">
            <button id="remove" type="button" class="bg-light-grayish-blue font-bold py-3 px-5 text-primary">-</button>
                <div class="bg-light-grayish-blue font-bold py-3 px-4 " id="quantity" value>1</div>
            <button id="add" type="button" class="bg-light-grayish-blue font-bold py-3 px-5 text-primary">+</button>
        </div>
        <input type="hidden" id="max" value="{{ $product->quantity }}">
        <input type="hidden" value="1" id="q"  name="quantity">
        <button class="bg-primary text-white rounded py-2 px-4 w-full">Add to cart</button>
    </form>
@endif