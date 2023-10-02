@if ($type === "update")

    <div class="w-full mb-10 text-center md:text-left">
        <a href="#" class="block text-primary uppercase mb-3 text-xs font-bold tracking-wider">sneaker company</a>
        <h2 id="n" class="text-dark-blue text-4xl md:text-5xl break-normal capitalize font-sans font-bold mb-8" contenteditable="true">{{ $product->name }}</h2>
        <p  id="d"class="text-dark-grayish-blue break-all mb-6" contenteditable="true">{{ $product->description }}</p>
        <h4 id="p" class="text-3xl font-bold" contenteditable="true">{{ str_replace("$", "", $product->price) }}</h4>
    </div>

    
    <form action="{{ route('product.update', ['product' => $product->id]) }}" id="update" method="POST" class="w-full">
        @csrf
        <input type="hidden" value="" id="max">
        <input type="hidden" id="name" name="name" value="">
        <input type="hidden" id="description" name="description" value="">
        <input type="hidden" id="price" name="price" value="">
        <input type="hidden" value="{{ $product->quantity }}" id="q" name="quantity">
        <p>quantity: {{ $product->quantity }}</p>
        <div class="flex w-full flex-col items-center md:justify-between md:flex-row">
            <x-counter/>
            <button class="bg-primary text-white rounded py-2 px-4 w-full" type="submit">UPDATE</button>
        </div>
    </form>

@else
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
        <input type="hidden" value="1" id="q"  name="q">
        <button class="bg-primary text-white rounded py-2 px-4 w-full">Add to cart</button>
    </form>
@endif