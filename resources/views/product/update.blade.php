<x-app-layout>

    <div class="mt-14 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-col md:flex-row justify-between">

            <div class="w-full h-fit md:pr-12">  
                <div class="flex flex-col justify-center items-center h-full">
                        <img src="{{ asset(Storage::url($product->images()->first()->name )) }}" id="img" alt="">

                        <div class="flex flex-col items-center pt-4 mb-6">
                            <input type="file" id="file" name="file" class="mb-2 w-[200px]">
                            <button type="button" id="upload-image" class="bg-green-500 w-fit hover:bg-green-600 text-white rounded py-2 px-3 uppercase">change image</button>
                        </div>

                </div>
            </div>
            
            <div class="w-full h-fit flex flex-col items-center bg-white px-4 md:pl-12 md:pr-10 pt-12">
        
                <div class="w-full pt-8 mb-10 text-center md:text-left">
                    <a href="#" class="block text-primary uppercase mb-3 text-xs font-bold tracking-wider">sneaker company</a>
                    <h2 id="n" class="text-dark-blue text-4xl md:text-5xl break-normal capitalize font-sans font-bold mb-8" contenteditable="true">{{ $product->name }}</h2>
                    <p  id="d"class="text-dark-grayish-blue break-all mb-6" contenteditable="true">{{ $product->description }}</p>
                    <h4 id="p" class="text-3xl font-bold" contenteditable="true">{{ str_replace("$", "", $product->price) }}</h4>
                </div>

                <x-product.forms.update :product="$product">
                    <x-select name="category" customClass="mb-4">
                        <option value="both">both</option>
                        <option value="men">men</option>
                        <option value="women">women</option>
                    </x-select>
                    <div class="flex w-full flex-col items-center md:justify-between md:flex-row">
                        <x-counter :quantity="$product->quantity"/>
                        <x-primary-button class="w-full justify-center">
                            save
                        </x-primary-button>    
                    </div>
                </x-product.forms.update>

                <div class="w-full flex justify-end">
                    <a href=" {{ route("product.show", ["product" => $product->id]) }}" class="text-dark-grayish-blue underline">show</a>
                </div>
            </div>
        </div>

        {{-- comments --}}
        <div>
        </div>
    </div>
</x-app-layout>