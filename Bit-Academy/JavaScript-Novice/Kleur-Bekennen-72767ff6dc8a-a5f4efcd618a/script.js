let pageTitle = document.title;
let header = document.querySelector("h1");
header.textContent = pageTitle;
const button = document.querySelector("input[type='button']");
const Color = document.getElementById("kleur");
button.addEventListener("click", function () {
    const welkleu = Color.value;
    document.body.setAttribute("style", `background-color: ${welkleu};`);
});