const inwonersaantallen = [10234, 34567, 12354, "29567", 55555, "23412", 52978];
const postcodes = ["10234", "10101", "34633", "29567", "55555", "23412", "33669"];
const plaatsnamen = [
    "Foobarstad",
    "Nieuw Foo",
    "Bardorp",
    "Barfoo",
    "Prodstad",
    "Developerdorp",
    "Nieuw developerdorp",
];

let foutplaatsen = [];
let wachtwoord = 0;


for (let i = 0; i < inwonersaantallen.length; i++) {
    const inwoner = (inwonersaantallen[i]);
    const postcode = (postcodes[i]);
    if (inwoner === postcode) {
        foutplaatsen.push(plaatsnamen[i]);
    }
    wachtwoord += Number(postcodes[i]);
}

console.log("De plaatsen met foutieve inwonersaantallen zijn:");
foutplaatsen.forEach((plaats) => console.log(plaats));
console.log(`Het wachtwoord is ${wachtwoord}`);
