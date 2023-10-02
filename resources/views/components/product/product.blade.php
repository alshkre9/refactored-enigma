<x-app-layout>
    <div class="mt-14">
        <div class="flex flex-col sm:flex-col md:flex-row justify-between">
            <div class="w-full h-fit md:pr-12">
                
                {{-- product image --}}
                <div class="flex justify-center items-center h-full">
                    @if(isset($image))
                        <x-product.image :image="$image"/>
                    @else
                        <div class="width-[512px] height-[512px] bg-dark-grayish-blue"></div>
                    @endif
                </div>

                @if ($type === "store" || $type === "update")
                    <div>
                        <x-product.forms.image/>
                    </div>
                @endif

            </div>
            
            {{-- form if role is admin he can update it otherwise buy it --}}
            <div class="w-full h-fit flex flex-col items-center bg-white px-4 md:pl-12 md:pr-10 pt-12">
                @isset($product)
                    <x-product.form :product="$product" :type="$type"/>
                @endisset
            </div>
        </div>

        {{-- comments --}}
        <div>
        </div>
    </div>
</x-app-layout>