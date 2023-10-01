window.onload = function () {
    if (document.getElementById("max"))
    {
        // counter logic
        let max = document.getElementById("max").value;
    
        if (isNaN(parseInt(max)))
        {
            max = Number.MAX_SAFE_INTEGER;
        }

        var conter = new Counter(parseInt(max));  

        document.getElementById("add").addEventListener("click", function() {
            conter.add()
        });
        
        document.getElementById("remove").addEventListener("click", function() {
            conter.remove() 
        });
    }
    
    // submit update from

    if (document.getElementById("update"))
    {

        document.getElementById("update").addEventListener("submit", function(){
            // change input field values
            document.getElementById("name").value = document.getElementById("n").innerText;
            document.getElementById("description").value = document.getElementById("d").innerText;
            document.getElementById("price").value = document.getElementById("p").innerText;
        });
    }

}

/* 
    class
*/
class Counter
{
    constructor (max, defualt_ = 1)
    {
        this.min = 0;
        this.max = max;
        this.value = defualt_;
        document.getElementById("quantity").innerText = this.value;
    }

    add()
    {
        if (this.value < this.max)
        {
            this.value += 1;
            document.getElementById("quantity").innerText = this.value;
            document.getElementById("q").value = this.value;
        }
    }
    
    remove()
    {
        if (this.value > this.min)
        {
            this.value -= 1;
            document.getElementById("quantity").innerText = this.value;
            document.getElementById("q").value = this.value;
        }
    }

}