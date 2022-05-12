var btn_showPaymenMethods = document.getElementById("showPaymentMethodsBtn");
var paymentMethods = document.getElementById("paymentMethods");

paymentMethods.style.display = "none";

btn_showPaymenMethods.addEventListener("click", () => {
    paymentMethods.style.display = "block";
});