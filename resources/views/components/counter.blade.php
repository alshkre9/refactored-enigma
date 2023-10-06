@props(["quantity"])

<div class="flex items-center md:mr-14 mb-4 md:mb-0  rounded">
    <button id="remove" type="button" class="bg-light-grayish-blue font-bold py-3 px-5 text-primary">-</button>
        <div id="q" class="bg-light-grayish-blue font-bold py-3 px-4" >{{ $quantity }}</div>
    <button id="add" type="button" class="bg-light-grayish-blue font-bold py-3 px-5 text-primary">+</button>
</div>