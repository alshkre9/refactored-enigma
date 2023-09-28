window.onload = function () {
    let max = document.getElementById("max").value;

    document.getElementById("add").addEventListener("click", function() {
        let quantity = parseInt(document.getElementById("quantity").innerText) + 1;

        if (max >= quantity)
        {
            document.getElementById("quantity").innerText = quantity; 
            document.getElementById("q").value = quantity;
        }
    });
    
    document.getElementById("remove").addEventListener("click", function() {
        let quantity = parseInt(document.getElementById("quantity").innerText) + 1;

        if (quantity > 2)
        {
            document.getElementById("quantity").innerText = parseInt(document.getElementById("quantity").innerText) - 1; 
            document.getElementById("q").value = quantity;
        }
    });
}