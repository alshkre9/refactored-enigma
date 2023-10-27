<x-app-layout>
    <div class="mt-14 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-rows-1 mb-6">
            @foreach ($cart as $product)
                <x-cart.card :product="$product[0]" :quantity="$product[1]"/>
            @endforeach
        </div>
        <a href="{{ route("purchase")}}" class="bg-green-500 text-white py-2 px-3 rounded w-full">purchase</a>
        <a href="{{ route("cart.delete")}}" class="bg-red-500 text-white py-2 px-3 rounded w-full">delete</a>
    </div>
</x-app-layout>