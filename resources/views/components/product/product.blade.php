<x-app-layout>
    <div class="mt-14">
        <div class="flex flex-col sm:flex-col md:flex-row justify-between">
            <div class="w-full h-fit md:pr-12">
                
                {{-- product image --}}
                <div class="flex flex-col justify-center items-center h-full">
        
                    @if(isset($product->image))
                        <img src="{{ asset(Storage::url($product->image)) }}" id="img" alt="">
                    @else
                        <img src="{{ asset(Storage::url('default.jpg'))}}" id="img" class="mb-4" alt="">
                    @endif
        
                    @if (!($type === "show"))
                        <div class="flex flex-col items-center pt-4 mb-6">
                            <input type="file" id="image" name="image" class="mb-2 w-[200px]">
                            @if ($type === "update")
                                <button type="button" id="upload-image" class="bg-green-500 w-fit hover:bg-green-600 text-white rounded py-2 px-3">change image</button>
                            @else 
                                <button type="button" id="upload-image" class="bg-green-500 w-fit hover:bg-green-600 text-white rounded py-2 px-3">change image</button>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="w-full h-fit flex flex-col items-center bg-white px-4 md:pl-12 md:pr-10 pt-12">
                @isset($product)

                    @if ($type === "show")
                        <x-product.forms.show :product="$product" />    
                    @endif

                    @if ($type === "update")
                        <x-product.forms.update :product="$product" />    
                    @endif
                        
                        @if ($type === "store")
                        <x-product.forms.store/>    
                    @endif
        
                @endisset
            </div>
        </div>

        {{-- comments --}}
        <div>
        </div>
    </div>
</x-app-layout>