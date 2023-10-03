<div class="w-full mb-10 text-center md:text-left">
    <a href="#" class="block text-primary uppercase mb-3 text-xs font-bold tracking-wider">sneaker company</a>
    <h2 id="n" class="text-dark-blue text-4xl md:text-5xl break-normal capitalize font-sans font-bold mb-8" contenteditable="true">this is the name of the product</h2>
    <p  id="d"class="text-dark-grayish-blue break-all mb-6" contenteditable="true">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex recusandae cupiditate voluptatum omnis modi tenetur itaque nesciunt a asperiores officiis excepturi quam ullam iusto quisquam laboriosam cum eligendi, doloribus est.</p>
    <h4 id="p" class="text-3xl font-bold" contenteditable="true">$0.00</h4>
</div>


<form action="{{ route('product.store') }}" id="theForm" method="POST" class="w-full">
    @csrf
    <input type="hidden" value="" id="max">
    <input type="hidden" id="name" name="name" value="">
    <input type="hidden" id="description" name="description" value="">
    <input type="hidden" id="price" name="price" value="">
    <input type="hidden" value="" id="q" name="quantity">
    <div class="flex w-full flex-col items-center md:justify-between md:flex-row">
        <x-counter/>
        <button class="bg-primary text-white rounded py-2 px-4 w-full" type="submit">Store</button>
    </div>
</form>
