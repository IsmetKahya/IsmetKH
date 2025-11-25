const input = document.getElementById('invoer');
const begin = document.getElementById('startEenheid');
const daarna = document.getElementById('convertEenheid');
const output = document.getElementById('output');


function arrows() {
    input.addEventListener('keydown', (e) => {
        if (e.keyCode === 38) {
            input.focus();
            input.dispatchEvent(new Event('change'));
            let currentValue = parseInt(input.value) || 0;
            input.value = currentValue + 10;
            console.log(input.value);
        } else if (e.keyCode === 40) {
            input.focus();
            let currentValue = parseInt(input.value) || 0;
            input.value = currentValue - 10;
            console.log(input.value);
            input.dispatchEvent(new Event('change'));
        } else if (e.keyCode === 39) {
            let currentValue = parseInt(input.value) || 0;
            input.value = currentValue + 1;
            console.log(input.value);
            input.focus();
            input.dispatchEvent(new Event('change'));
        } else if (e.keyCode === 37) {
            let currentValue = parseInt(input.value) || 0;
            input.value = currentValue - 1;
            console.log(input.value);
            input.focus();
        }
    });
}

function keyboard() {
    document.addEventListener('keydown', (e) => {
        if (e.keyCode === 81) {
            begin.focus();
            begin.value = 'ml';
            begin.dispatchEvent(new Event('change'));
            console.log(begin.value);
        } else if (e.keyCode === 87) {
            begin.focus();
            begin.value = 'cl';
            begin.dispatchEvent(new Event('change'));
            console.log(begin.value);
        } else if (e.keyCode === 69) {
            begin.focus();
            begin.value = 'dl';
            begin.dispatchEvent(new Event('change'));
            console.log(begin.value);
        } else if (e.keyCode === 82) {
            begin.focus();
            begin.value = 'l';
            begin.dispatchEvent(new Event('change'));
            console.log(begin.value);
        }
    });
}

function gewenstekeyboard() {
    document.addEventListener('keydown', (e) => {
        if (e.keyCode === 65) {
            daarna.focus();
            daarna.value = 'ml';
            daarna.dispatchEvent(new Event('change'));
            console.log(daarna.value);
        } else if (e.keyCode === 83) {
            daarna.focus();
            daarna.value = 'cl';
            daarna.dispatchEvent(new Event('change'));
            console.log(daarna.value);
        } else if (e.keyCode === 68) {
            daarna.focus();
            daarna.value = 'dl';
            daarna.dispatchEvent(new Event('change'));
            console.log(daarna.value);
        } else if (e.keyCode === 70) {
            daarna.focus();
            daarna.value = 'l';
            daarna.dispatchEvent(new Event('change'));
            console.log(daarna.value);
        }
    });
}


function calculator() {
    if (Number.isNaN(input.value)) {
        output.textContent = '-';
        return;
    }

    const units = {
        ml: 1,
        cl: 10,
        dl: 100,
        l: 1000,
    };

    const inputml = input.value * units[begin.value];
    const resultaat = inputml / units[daarna.value];
    output.textContent = (`${resultaat} ${daarna.value}`);
}

input.addEventListener('input', calculator);
begin.addEventListener('change', calculator);
daarna.addEventListener('change', calculator);


calculator();
gewenstekeyboard();
arrows();
keyboard();