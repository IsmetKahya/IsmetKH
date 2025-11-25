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

const body = document.body;


personen.forEach(persoon => {
    const h1 = document.createElement("h1");
    h1.textContent = persoon.naam;

    const leeftijd = document.createElement("p");
    leeftijd.textContent = `Leeftijd: ${persoon.leeftijd}`;

    const hobbyp = document.createElement("p");
    hobbyp.textContent = `Hobby: ${persoon.hobby}`;

    const rijbewijs = document.createElement("p");
    if (persoon.leeftijd >= 18) {
        rijbewijs.textContent = `Mag rijden: Ja`;
    } else {
        rijbewijs.textContent = `Mag rijden: Nee`;
    }

    body.append(h1, leeftijd, hobbyp, rijbewijs);
});