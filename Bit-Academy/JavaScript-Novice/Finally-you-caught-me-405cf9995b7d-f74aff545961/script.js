function dagVanDeWeek(dagGetal) {
    let dagen = [
        "Maandag",
        "Dinsdag",
        "Woensdag",
        "Donderdag",
        "Vrijdag",
        "Zaterdag",
        "Zondag",
    ];

    if (dagGetal < 0 || dagGetal > 6 || typeof (dagGetal) !== "number") {
        throw new Error("Geen geldige dag!");
    } else {
        return dagen[dagGetal];
    }
}

const testWaardes = [3, "onbekend", -2, 7, 2, 8, 4];




testWaardes.forEach((getal) => {
    let head = document.createElement("h2");
    document.body.appendChild(head);

    try {
        let result = dagVanDeWeek(getal);
        head.textContent = result;
        head.style.color = "green";
    } catch (error) {
        head.textContent = `Onbekend`;
        head.style.color = "red";
    }
});