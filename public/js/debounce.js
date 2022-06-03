function debounce(fn, waitInMs) {
    let timeout;

    return function () {
        const context = this;
        const args = arguments;

        clearTimeout(timeout);

        timeout = setTimeout(() => {
            fn.apply(context, args);
        }, waitInMs);
    }
}

const search = document.getElementById("searchField");

const searchToBeDebounced = debounce((title) => {

    fetch(`/product/fast-search/`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.getElementsByName("_token")[0].value 
        },
        mode: "cors",

        body: JSON.stringify({ data: title })
    })
        .then(res => res.json())
        .then(data => {

            const box = document.getElementById("results-box");
            
            if (box.hasChildNodes() && box.children.length !== 0) {
                box.removeChild(box.firstElementChild);
            }

            if (data.length !== 0) {

                var article = document.createElement("article");
                var link = document.createElement("a");
                var h1 = document.createElement("h1");
                var span = document.createElement("span");

                box.style.backgroundColor = "white";

                data.forEach(product => {
                    
                    box.appendChild(article);
                    article.appendChild(link);
                    link.appendChild(h1);
                    link.appendChild(span);
                    
                    h1.innerText = product.title;
                    span.innerText = `R$${product.amount}`;
                
                    link.href = `/product/${product.id}`;
                });

            } else {
                box.style.backgroundColor = "transparent";
            } 
        });

}, 1000);

search.addEventListener("keydown", (e) => searchToBeDebounced(search.value));


