const gemeente = {
    naam: 'Bar',
    hoofdstad: 'Foobarstad',
    steden: [
        {
            postcode: '10234',
            naam: 'Foobarstad',
            inwoners: 10234,
            burgemeester: {
                naam: 'nhoJ',
                aangetreden: 2020,
            },
        },

        {
            postcode: '10101',
            naam: 'Nieuw Foo',
            inwoners: 34567,
            burgemeester: {
                naam: 'enaJ',
                aangetreden: 2019,
            },
        },

        {
            postcode: '34633',
            naam: 'Bardorp',
            inwoners: 12354,
            burgemeester: {
                naam: 'hargaZ',
                aangetreden: 2020,
            },
        },

        {
            postcode: '29567',
            naam: 'Barfoo',
            inwoners: 1376,
            burgemeester: {
                naam: 'leraK',
                aangetreden: 2022,
            },
        },

        {
            postcode: '55555',
            naam: 'Prodstad',
            inwoners: 55555,
            burgemeester: {
                naam: 'iL',
                aangetreden: 2018,
            },
        },

        {
            postcode: '23412',
            naam: 'Developerdorp',
            inwoners: 3,
            burgemeester: {
                naam: 'nalA',
                aangetreden: 2021,
            },
        },

        {
            postcode: '33669',
            naam: 'Nieuw developerdorp',
            inwoners: 52978,
            burgemeester: {
                naam: 'regsdE',
                aangetreden: 2020,
            },
        },
    ],
};
const table = document.querySelector('table');

gemeente.steden.forEach((stad, index) => {
    const row = document.querySelector(`#stad${index + 1}`);
    if (row) {
        row.querySelector(`#naam${index + 1}`).textContent = stad.naam;
        row.querySelector(`#inwonersaantal${index + 1}`).textContent = stad.inwoners;
        row.querySelector(`#burgemeester${index + 1}`).textContent =
            stad.burgemeester.naam.split('').reverse().join('');
        row.querySelector(`#postcode${index + 1}`).textContent = stad.postcode;
    }
});