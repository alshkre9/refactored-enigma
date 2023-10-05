<x-app-layout>
    @if ($role === "admin")
        <div class="mb-4 border-b py-2">
            @if ($type === "update")
                <a href="{{ route("product.show", ["product" => $product->id ])}}" class="py-2 px-3 bg-primary text-white rounded">show</a>
            @endif
            @if ($type === "show")
                <a href="{{ route("product.update", ["product" => $product->id ])}}" class="py-2 px-3 bg-green-500 hover:bg-green-500 text-white rounded">update</a>
            @endif
        </div>
    @endif
    <div class="mt-14">
        <div class="flex flex-col sm:flex-col md:flex-row justify-between">
            <div class="w-full h-fit md:pr-12">
                
                {{-- product image --}}
                <div class="flex flex-col justify-center items-center h-full">
        
                    @if($product->images()->first())
                        <img src="{{ asset(Storage::url($product->images()->first()->name)) }}" id="img" alt="">
                    @else
                        <img src="{{ asset(Storage::url('default.jpg'))}}" id="img" class="mb-4" alt="">
                    @endif
        
                    @if (!($type === "show"))
                        <div class="flex flex-col items-center pt-4 mb-6">
                            <input type="file" id="file" name="file" class="mb-2 w-[200px]">
                            @if ($type === "update")
                                <button type="button" id="upload-image" class="bg-green-500 w-fit hover:bg-green-600 text-white rounded py-2 px-3">change image</button>
                            @endif
                            @if ($type === "store")
                                <button type="button" id="upload-image" class="bg-green-500 w-fit hover:bg-green-600 text-white rounded py-2 px-3">upload image</button>
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