<x-app-layout>
    <div>
        <x-product.image :image="$image" size="big"/>
    </div>
    <div id="form">
            <x-product.form :role="$role"/>
    </div>
</x-app-layout>