function optellen(x) {
    const getal = 0;
    getal = getal + x;
    return getal;
}

function check(x) {

        if (x < 0) {
            throw new RangeError("Getal moet groter zijn dan 0");
        }
        
    }




function showerror(e) {
            console.log("Er is een error gevonden!");
            console.log("ErrorType:", e.name);
            console.log("Message:", e.message);
}
try {
    optellen(5);
    check(-2);
    missendeFunctie();
} catch (e) {
    showerror(e);
}