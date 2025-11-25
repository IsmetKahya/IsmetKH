let pageTitle = document.title;
let header = document.querySelector("h1");
header.textContent = pageTitle;
const button = document.querySelector("input[type='button']");
button.addEventListener("click", function () {
    document.body.setAttribute("style", "background-color: red;");
});
