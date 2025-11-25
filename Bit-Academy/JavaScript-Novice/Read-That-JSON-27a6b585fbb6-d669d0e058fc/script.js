const container = document.getElementById("container");
const example = document.getElementById("example");

example.innerHTML = `
    <h2>Name</h2>
    <p>Hobby</p>
    <p>Job</p>
`;

fetch('people.json')
    .then(response => response.json())
    .then(data => {
        data.forEach(person => {
            const card = document.createElement("div");
            card.classList.add("card");
            card.innerHTML = `
                <h2>${person.name}</h2>
                <p>${person.hobby}</p>
                <p>${person.job}</p>
            `;
            container.appendChild(card);
        });
    });