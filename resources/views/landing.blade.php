<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <x-product.add/>
        @foreach ($products as $product)
            <x-product.card :product="$product"/>
        @endforeach
    </div>
</x-app-layout>