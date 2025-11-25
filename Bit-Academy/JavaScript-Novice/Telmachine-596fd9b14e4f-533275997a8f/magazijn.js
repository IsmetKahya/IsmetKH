const magazijn = {
    borden: 42,
    glazen: 57,
    messen: 85,
    vorken: 96,
    lepels: 103,
};

const verkocht = [
    "lepel", "vork", "vork", "bord",
    "lepel", "mes", "glas", "glas",
    "bord", "lepel", "lepel", "bord",
    "glas", "bord", "mes", "bord",
    "lepel", "vork", "glas", "bord",
    "vork", "vork",
];
const products = {
    borden: 0,
    glazen: 0,
    messen: 0,
    vorken: 0,
    lepels: 0,
};

verkocht.forEach(element => {
    switch (element) {
        case 'lepel':
            products.lepels++;
            break;
        case 'vork':
            products.vorken++;
            break;
        case 'mes':
            products.messen++;
            break;
        case 'glas':
            products.glazen++;
            break;
        case 'bord':
            products.borden++;
            break;
        default:
            break;
    }
});

const resultaat = {};
for (const [key, value] of Object.entries(magazijn)) {
    resultaat[key] = value - products[key];
}
console.log(JSON.stringify(resultaat));