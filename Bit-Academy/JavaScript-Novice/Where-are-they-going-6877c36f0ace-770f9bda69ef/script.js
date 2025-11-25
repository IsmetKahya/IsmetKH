const treinStations = [
    ["Delft", 8400170],
    ["Amsterdam", 8400058],
    ["Alkmaar", 8400050],
    ["Deventer", 8400173],
    ["Venlo", 8400644],
    ["Utrecht", 8400621],
];

async function getData() {
    const data = await fetch('https://randomuser.me/api/?results=6');
    const jsonData = await data.json();
    return jsonData;
}

async function getCountryFlag(countryName) {
    const flag = await fetch(`https://restcountries.com/v3.1/name/${countryName}`);
    const response = await flag.json();
    return response[0].flags.png;
}

function getTrainStationName(index) {
    return treinStations[index][0];
}

function getTrainStationCode(index) {
    return treinStations[index][1];
}

async function getDestination(cityCode) {
    const headers = {
        "Ocp-Apim-Subscription-Key": "22dca0393fcb4cc995b42773672c3cf5",
        "Content-Type": "application/json",
    };
    const url = `https://gateway.apiportal.ns.nl/reisinformatie-api/api/v2/departures?uicCode=${cityCode}`;
    const request = await fetch(url, { headers });
    const response = await request.json();
    return response.payload.departures[0].direction;
}

async function setData() {
    const data = await getData();
    const firstParentElement = document.querySelector('.persons');
    let index = 0;
    data.results.forEach(async person => {
        const name = `${person.name.first} ${person.name.last}`;
        const parentElement = document.createElement('div');
        const flag = await getCountryFlag(person.location.country);
        const cityName = getTrainStationName(index);
        const stationName = `Op bezoek in ${cityName}`;
        const cityCode = getTrainStationCode(index);
        index++;
        const destination = await getDestination(cityCode);
        const destinationName = `Eindbestemming: ${destination}`;
        setValues(firstParentElement, parentElement, name, person, flag, stationName, destinationName);
    });
}

function setValues(firstParentElement, parentElement, name, person, flag, stationName, destinationName) {
    addHtmlElementsInDiv(firstParentElement, parentElement, 'h3', name);
    addHtmlElementsInDiv(firstParentElement, parentElement, 'img', person.picture.large);
    addHtmlElementsInDiv(firstParentElement, parentElement, 'img', flag);
    addHtmlElementsInDiv(firstParentElement, parentElement, 'p', person.email);
    addHtmlElementsInDiv(firstParentElement, parentElement, 'p', stationName);
    addHtmlElementsInDiv(firstParentElement, parentElement, 'p', destinationName);
}

function addHtmlElementsInDiv(firstParentElement, parentElement, tag, text) {
    const element = document.createElement(tag);
    if (element.nodeName === 'IMG') {
        element.src = text;
        const isPng = text.endsWith('png');
        if (isPng) {
            element.classList.add('country');
        }
    } else {
        element.textContent = text;
    }
    parentElement.appendChild(element);
    firstParentElement.appendChild(parentElement);
    document.body.append(firstParentElement);
}

setData();