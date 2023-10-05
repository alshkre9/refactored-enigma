<div class="w-full mb-10 text-center md:text-left">
    <a href="#" class="block text-primary uppercase mb-3 text-xs font-bold tracking-wider">sneaker company</a>
    <h2 class="text-dark-blue text-4xl md:text-5xl capitalize font-sans font-bold mb-8">{{ $product->name }}</h2>
    <p class="text-dark-grayish-blue mb-6">{{ $product->description }}</p>
    <h4 class="text-3xl font-bold">{{ $product->price }}</h4>
</div>

<form action="{{ route("cart.add", ["product" => $product->id  ]) }}" 
    class="flex w-full flex-col items-center md:justify-between md:flex-row mb-6 md:mb-0" method="post">

    @csrf

    <x-counter/>
    <input type="hidden" id="max" value="{{ $product->quantity }}">
    <input type="hidden" value="1" id="q"  name="quantity">
    <button class="bg-primary text-white rounded py-2 px-4 w-full">Add to cart</button>
</form>