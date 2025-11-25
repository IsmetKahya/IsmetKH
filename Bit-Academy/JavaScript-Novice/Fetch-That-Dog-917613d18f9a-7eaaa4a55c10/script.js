const image = document.getElementById('image');
const likeBut = document.getElementById('likeBut');
const dislikeBut = document.getElementById('dislikeBut');
const like = document.getElementById('likes');
const dislike = document.getElementById('dislike');

let likes = parseInt(localStorage.getItem('likes')) || 0;
let dislikes = parseInt(localStorage.getItem('dislikes')) || 0;

function teller() {
    like.textContent = likes;
    dislike.textContent = dislikes;
}

function fetchimage() {
    fetch('https://dog.ceo/api/breeds/image/random')
        .then(response => response.json())
        .then(data => {
            image.src = data.message;
        });
}

likeBut.addEventListener('click', () => {
    likes++;
    localStorage.setItem('likes', likes);
    teller();
    fetchimage();
});

dislikeBut.addEventListener('click', () => {
    dislikes++;
    localStorage.setItem('dislikes', dislikes);
    teller();
    fetchimage();
});

window.onload = () => {
    fetchimage();
    teller();
};
