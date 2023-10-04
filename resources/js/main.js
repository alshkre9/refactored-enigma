// const { document } = require("postcss");
window.onload = function () {

    var max = document.getElementById("max");
    const quantity = document.getElementById("quantity");
    const q = document.getElementById("q");
    var img = document.getElementById("img");
    var image = document.getElementById("image");
    var product = document.getElementById("product");

    if (max)
    {
        // counter logic
        if (isNaN(parseInt(max)))
        {
            max = Number.MAX_SAFE_INTEGER;
        }

        var counter = new Counter(parseInt(max));  
        quantity.innerText = counter.value;

        document.getElementById("add").addEventListener("click", function() {
            counter.add()

            quantity.innerText = counter.value;
            q.value = counter.value;
        });
        
        document.getElementById("remove").addEventListener("click", function() {
            counter.remove() 
    
            quantity.innerText = counter.value;
            q.value = counter.value;
        });

    }
    
    // upload image
    if (document.getElementById("upload-image"))
    {
        document.getElementById("upload-image").addEventListener("click", function () {
            if (document.getElementById("file").files[0])
            {
                var file = document.getElementById("file").files[0];
                var product_id = product.value 
                var ajax = new AjaxFormSubmitter({"image": file}, "POST", "/image/upload/" + product_id);
                ajax.onReadyResponse((xhr) => {

                    img.src = img.src + "?" + String(performance.now());
                    image.value = xhr.responseText;
        
                });

                ajax.send()
            }
        });
    }

    // submit update or store form
    if (document.getElementById("theForm"))
    {

        document.getElementById("theForm").addEventListener("submit", function(){
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
    }

    add()
    {
        if (this.value < this.max)
        {
            this.value += 1;
        }
    }
    
    remove()
    {
        if (this.value > this.min)
        {
            this.value -= 1;
        }
    }

}

class AjaxFormSubmitter
{
    constructor(data = {}, method, url)
    {
        this.xhr = new XMLHttpRequest();
        this.xhr.open(method, url);
        this.data = data;
    }

    send()
    {
        var formdata = new FormData();
        for (let key in this.data)
        {
            formdata.append(key, this.data[key])
        }
        this.xhr.send(formdata)
    }

    onReadyResponse(callback)
    {
        this.xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200)
            {
                callback(this);
            }
        };
    }
}