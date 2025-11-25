const container = document.getElementById("persons");

fetch('https://randomuser.me/api/?results=6')
    .then(response => response.json())
    .then(data => {
        data.results.forEach(person => {
            const card = document.createElement("div");
            card.classList.add("card");
            card.innerHTML = `
                <h2>${person.name.first} ${person.name.last}</h2>
                <img src="${person.picture.large}" alt="${person.name.first}">
                <p>${person.email}</p>
                <p>${person.location.country}</p>
            `;
            container.appendChild(card);
        });
    });