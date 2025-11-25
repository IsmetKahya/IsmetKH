const text = document.getElementById("cookie-banner");
const timeout = document.getElementById("callback");
const d = new Date();
function getCurrentTime() {
    let now = new Date();
    let hours = now.getHours();
    let minutes = now.getMinutes();
    let seconds = now.getSeconds();
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
    return hours + ":" + minutes + ":" + seconds;
}

setInterval(function () {
    let time = getCurrentTime();
    console.log(time);
    timeout.textContent = `Het is ${time} voor pauze`;
}, 2000);


setTimeout(() => {
    let time = getCurrentTime();
    timeout.textContent = (`${time}`);
    alert(`Het is ${time}. Tijd voor pauze`);
}, 4000);
document.getElementById("accept-knop").addEventListener("click", () => {
    text.textContent = ("Bedankt voor je toestemming!");
});
document.getElementById("reject-knop").addEventListener("click", () => {
    text.textContent = ("Sad :((((");
});

