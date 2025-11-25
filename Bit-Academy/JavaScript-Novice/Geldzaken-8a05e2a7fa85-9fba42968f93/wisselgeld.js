let geld = parseInt(process.argv[2]);
let fijftigeuro = 0;
let twintigeuro = 0;
let tieneuro = 0;
let vijfeuro = 0;
while (geld >= 5) {
    if (geld >= 50) {
        geld -= 50;
        fijftigeuro++;
    } else if (geld >= 20) {
        geld -= 20;
        twintigeuro++;
    } else if (geld >= 10) {
        geld -= 10;
        tieneuro++;
    } else if (geld >= 5) {
        geld -= 5;
        vijfeuro++;
    }
}

if (fijftigeuro > 0) {
    console.log(`${fijftigeuro}x €50`);
}
if (twintigeuro > 0) {
    console.log(`${twintigeuro}x €20`);
}
if (tieneuro > 0) {
    console.log(`${tieneuro}x €10`);
}
if (vijfeuro > 0) {
    console.log(`${vijfeuro}x €5`);
}