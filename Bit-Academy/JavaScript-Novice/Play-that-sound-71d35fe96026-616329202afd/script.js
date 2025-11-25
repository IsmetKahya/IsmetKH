const audios = document.querySelectorAll("audio");
const buttons = document.querySelectorAll("button");
const buttontexts = Array.from(buttons).map(button => button.textContent);
buttons.forEach(button => {
    button.addEventListener("click", function () {
        const audioId = button.getAttribute("data-audio");
        const selectedAudio = document.getElementById(audioId);
        if (selectedAudio.paused) {
            audios.forEach(audio => {
                audio.pause();
                audio.currentTime = 0;
                const otherButton = document.querySelector(`button[data-audio="${audio.id}"]`);
                if (otherButton) {
                    const index = Array.from(audios).indexOf(audio);
                    otherButton.textContent = buttontexts[index];
                }
            });

            selectedAudio.play();
            button.textContent = "STOP";
        } else {
            selectedAudio.pause();
            button.textContent = "PLAY";
        }
    });
});
