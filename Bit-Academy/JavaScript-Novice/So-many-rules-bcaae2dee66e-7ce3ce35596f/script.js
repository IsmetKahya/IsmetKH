const personen = [
    {
        naam: "Mustafa",
        leeftijd: 15,
        hobby: "vissen",
    },
    {
        naam: "Leonie",
        leeftijd: 23,
        hobby: "lezen",
    },
    {
        naam: "Jasper",
        leeftijd: 18,
        hobby: "tuinieren",
    },
];

const container = document.createElement("div");
document.body.appendChild(container);

container.innerHTML = personen
    .map(
        (persoon) => `
    <h1>${persoon.naam}</h1>
        <p>Leeftijd: ${persoon.leeftijd}</p>
        <p>Hobby: ${persoon.hobby}</p>`,
    )
    .join("");