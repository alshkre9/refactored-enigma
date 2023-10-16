<x-app-layout>
    <div class="flex flex-col">
        <div>
            {{-- <img src="{{ $image }}" alt=""> --}}
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($role === "admin")
                <x-product.add/>
            @endif
            @foreach ($products as $product)
                    <x-product.card :product="$product"/>
            @endforeach
        </div>
    </div>
</x-app-layout>