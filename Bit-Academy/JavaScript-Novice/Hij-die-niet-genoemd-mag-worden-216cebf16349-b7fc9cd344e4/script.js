const text = document.getElementById("cookie-banner");
document.getElementById("accept-knop").addEventListener("click", function () {
    text.textContent = ("Bedankt voor je toestemming!");
});
document.getElementById("reject-knop").addEventListener("click", function () {
    text.textContent = ("Sad :((((");
});
