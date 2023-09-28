<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-14 mt-14 pt-8 mx-auto">
        <div class="flex flex-col  sm:flex-col md:flex-row justify-between">
            <div class="w-full h-fit pr-12">
                {{-- product image --}}
                <div class="flex justify-center items-center h-full">
                    <x-product.image :image="$image" size="big"/>
                </div>

                <div>
                </div>

            </div>
            
            {{-- form if role is admin he can update it otherwise buy it --}}
            <div class="w-full h-fit flex flex-col items-center bg-white pl-4 pl-12 pr-10 pt-6">
                <div class="h-full mb-8 text-center md:text-left">
                    <a href="#" class="block text-primary uppercase mb-3 text-xs font-bold tracking-wider">sneaker company</a>
                    <h2 class="text-dark-blue text-4xl capitalize font-sans font-bold mb-8">fall limited edition sneakers hi this is the rock</h2>
                    <p class="text-dark-grayish-blue mb-6">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, placeat alias, cumque consequatur eos consectetur, dolore eaque ipsum reprehenderit ad quod voluptates commodi corrupti eligendi quasi inventore autem facilis similique!</p>
                    <h4 class="text-3xl font-bold">$125.00</h4>
                </div>
                <div class="w-full">
                    <x-product.form :role="$role" :product="$product"/>
                </div>
            </div>
        </div>
        {{-- comments --}}
        <div>
            <p>comment</p>
        </div>
    </div>
</x-app-layout>