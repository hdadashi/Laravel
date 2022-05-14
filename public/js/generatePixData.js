const btnGeneratePixData = document.getElementById("generatePixData");
const inputCopyPixCode = document.getElementById("copyPixCode");

inputCopyPixCode.style.display = "none";

btnGeneratePixData.addEventListener("click", (e) => {
    
    fetch("/product/buy/pix", {
        method: "POST",
        mode: "cors",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector("input[name='_token']").value
        },

        body: JSON.stringify({ message: "Hello" })    
    })

    .then(res => res.json())
    .then(data => {

        const qrCodeImage = document.createElement("img");

        qrCodeImage.src = `data:image/jpeg;base64,${data.qr_code_base64}`;
        document.querySelector(".qr_code").appendChild(qrCodeImage);         
   
        document.getElementById("copyPixCodeText").value = data.qr_code;
        copyPixCode.style.display = "block";
    });
});

