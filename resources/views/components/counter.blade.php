@props(["quantity"])

<div class="flex items-center md:mr-14 mb-4 rounded bg-grayish-blue md:mb-0">
    <button id="remove" type="button" class="bg-transparent font-bold py-3 px-5 text-primary">-</button>
        <div id="q" class="bg-transparent font-bold py-3 px-4" >{{ $quantity }}</div>
    <button id="add" type="button" class="bg-transparent font-bold py-3 px-5 text-primary">+</button>
</div>