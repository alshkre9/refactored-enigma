<x-app-layout>
    @if ($role === "admin")
        <div class="mb-4 border-b py-2">
            <a href="{{ route("product.store")}}" class="py-2 px-3 bg-green-500 text-white rounded">add</a>
        </div>
    @endif
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ($products as $product)
            <x-product.card :product="$product"/>
        @endforeach
    </div>
</x-app-layout>