const Color = document.getElementById("kleur");
const button = document.querySelector("input[type='button']");
const button2 = document.getElementById("beide");
const button3 = document.getElementById("titels");


button.addEventListener("click", function () {
    const welkleu = Color.value;
    document.body.setAttribute("style", `background-color: ${welkleu};`);
});


button2.addEventListener("click", function () {
    const whichcolor = Color.value;
    document.body.setAttribute("style", `background-color: ${whichcolor};`);
    const headers = document.querySelectorAll("h1");
    headers.forEach(header => {
        header.setAttribute("style", `color: ${whichcolor};`);
    });
});


button3.addEventListener("click", function () {
    const whichcolor = Color.value;
    const headers = document.querySelectorAll("h1");
    headers.forEach(header => {
        header.setAttribute("style", `color: ${whichcolor};`);
    });
});