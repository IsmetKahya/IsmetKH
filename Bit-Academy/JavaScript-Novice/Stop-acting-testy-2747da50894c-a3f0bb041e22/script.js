const seconden = document.getElementById('seconds');
const text = document.getElementById('text');
const button = document.getElementById('startbutton');
let woordteller = 0;
let welkewoord = "";
let chars = 0;

/**
 * Use this function to retrieve a random word.
 *
 * @returns a string containing a random word.
 */

async function getWord() {
    const response = await fetch("https://random-word-bit.vercel.app/word");
    const word = await response.json();
    return word[0].word.toLowerCase();
}

async function secondteller(inputf) {
    let timeleft = 60;
    seconden.textContent = `${timeleft}s`;

    const countdown = setInterval(async () => {
        timeleft--;
        seconden.textContent = `${timeleft}s`;

        if (timeleft <= 0) {
            clearInterval(countdown);
            text.textContent = `Je typte ${woordteller} woorden (${chars}) per minuut`;
            inputf.disabled = true;
            resetButton();
        }
    }, 1000);

    welkewoord = await getWord();
    text.textContent = welkewoord;
    inputf.addEventListener("input", () => {
        chars++;

        if (inputf.value.trim().toLowerCase() === welkewoord) {
            woordteller++;
            inputf.value = "";
            getNewWord();
        }
    });
}

async function getNewWord() {
    welkewoord = await getWord();
    text.textContent = welkewoord;
}

button.addEventListener('click', () => {
    button.outerHTML = `<input type="text" id="buttoninput">`;
    const inputf = document.getElementById('buttoninput');
    inputf.focus();
    secondteller(inputf);
});

async function resetButton() {
    const inputf = document.getElementById('buttoninput');
    if (inputf) {
        inputf.outerHTML = `<button id="startbutton" type="button">Start</button>`;
        const tweedebutton = document.getElementById('startbutton');

        tweedebutton.addEventListener('click', () => {
            tweedebutton.outerHTML = `<input type="text" id="buttoninput">`;
            const newinput = document.getElementById('buttoninput');
            newinput.focus();
            secondteller(newinput);
        });
    }
}
