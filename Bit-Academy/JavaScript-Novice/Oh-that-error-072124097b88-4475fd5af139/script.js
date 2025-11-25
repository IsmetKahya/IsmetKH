function genType() {
    throw new TypeError("TypeErrorMessage");
}

function genRange() {
    throw new RangeError("RangeErrorMessage");
}

function genReference() {
    throw new ReferenceError("ReferenceErrorMessage");
}

const functies = [
    () => {
        genType();
    },
    () => {
        genReference();
    },
    () => {
        genRange();
    },
    () => {
        genType();
    },
    () => {
        genReference();
    },
    () => {
        genRange();
    },
    () => {
        genType();
    },
    () => {
        genReference();
    },
    () => {
        genRange();
    },
];



functies.forEach((functie) => {
    try {
        functie();
    } catch (error) {
        if (error instanceof TypeError || error instanceof RangeError) {
            const container = document.createElement("div");
            container.innerHTML = `
                <p>Er is een error gevonden!</p>
                <p>ErrorType: "${error.name}"</p>
                <p>Message: "${error.message}"</p>
                <br/>
            `;
            document.body.appendChild(container);
        }
    }
});