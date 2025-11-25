document.getElementById('invoer').addEventListener('input', calculator);
document.getElementById('startEenheid').addEventListener('change', calculator);
document.getElementById('convertEenheid').addEventListener('change', calculator);

function calculator() {
    const input = parseFloat(document.getElementById('invoer').value);
    const begin = document.getElementById('startEenheid').value;
    const daarna = document.getElementById('convertEenheid').value;
    const output = document.getElementById('output');

    if (Number.isNaN(input)) {
        output.textContent = '-';
        return;
    }

    const units = {
        ml: 1,
        cl: 10,
        dl: 100,
        l: 1000,
    };

    const inputml = input * units[begin];
    const resultaat = inputml / units[daarna];
    output.textContent = (`${resultaat} ${daarna}`);
}