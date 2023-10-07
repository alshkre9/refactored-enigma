<x-app-layout>

    @if ($role === "admin")
        <div class="mb-4 border-b py-2">
            <a href="{{ route("product.show", ["product" => $product->id ])}}" class="py-2 px-3 bg-primary text-white rounded">show</a>
            <a href="{{ route("product.update", ["product" => $product->id ])}}" class="py-2 px-3 bg-green-500 hover:bg-green-600 text-white rounded">update</a>
        </div>
    @endif

    <div class="mt-14">
        <div class="flex flex-col sm:flex-col md:flex-row justify-between">

            <div class="w-full h-fit md:pr-12">  
                <div class="flex flex-col justify-center items-center h-full">
                        <img src="{{ asset(Storage::url($product->images()->first()->name )) }}" id="img" alt="">
                </div>
            </div>
            
            <div class="w-full h-fit flex flex-col items-center bg-white px-4 md:pl-12 md:pr-10 pt-12">
        
                <div class="w-full pt-8 mb-10 text-center md:text-left">
                    <a href="#" class="block text-primary uppercase mb-3 text-xs font-bold tracking-wider">sneaker company</a>
                    <h2 id="n" class="text-dark-blue text-4xl md:text-5xl break-normal capitalize font-sans font-bold mb-8">{{ $product->name }}</h2>
                    <p  id="d"class="text-dark-grayish-blue break-all mb-6">{{ $product->description }}</p>
                    <h4 id="p" class="text-3xl font-bold">{{ $product->price }}</h4>
                </div>

                <x-product.forms.show :product="$product">
                    <div class="flex w-full flex-col items-center md:justify-between md:flex-row">
                        <x-counter :quantity="1"/>
                        <x-primary-button class="w-full justify-center">
                            add to cart
                        </x-primary-button>
                    </div>
                </x-product.forms.show>

            </div>
        </div>

        {{-- comments --}}
        <div>
        </div>
    </div>
</x-app-layout>