<x-app-layout>
        <div class="flex flex-col sm:flex-col md:flex-row justify-between">
            <div class="w-full h-fit md:pr-12">
                {{-- product image --}}
                <div class="flex justify-center items-center h-full">
                    <x-product.image :image="$image" size="big"/>
                </div>

                <div>
                </div>

            </div>
            
            {{-- form if role is admin he can update it otherwise buy it --}}
            <div class="w-full h-fit flex flex-col items-center bg-white px-4 md:pl-12 md:pr-10 pt-12">
                    <x-product.form :product="$product" :type="$type"/>
            </div>
        </div>

        {{-- comments --}}
        <div>
        </div>

</x-app-layout>