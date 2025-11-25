let img = document.createElement("img");
img.src = "https://picsum.photos/id/0/300/200";
document.body.appendChild(img);
let hf = document.createElement("h1");
hf.textContent = "Dit is mijn titel";
let par = document.createElement("p");
par.textContent = "en dit is mijn paragraf";
document.body.appendChild(hf);
document.body.appendChild(par);