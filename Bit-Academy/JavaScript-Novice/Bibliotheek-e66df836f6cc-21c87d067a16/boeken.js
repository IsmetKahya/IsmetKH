let catalogus = [
    {
        ISBN: "978-1449355739",
        aantal: 1,
    },
    {
        ISBN: "978-0596806750",
        aantal: 2,
    },
    {
        ISBN: "978-0596805524",
        aantal: 1,
    },
    {
        ISBN: "978-1491905012",
        aantal: 1,
    },
    {
        ISBN: "978-0596008642",
        aantal: 3,
    },
    {
        ISBN: "978-0596004897",
        aantal: 2,
    },
];

const dagverloop = [
    {
        ISBN: "978-0596806750",
        handeling: "uitlening",
    },
    {
        ISBN: "978-1491905012",
        handeling: "teruggave",
    },
    {
        ISBN: "978-0596805524",
        handeling: "uitlening",
    },
    {
        ISBN: "978-1449319243",
        handeling: "teruggave",
    },
    {
        ISBN: "978-1491905012",
        handeling: "uitlening",
    },
    {
        ISBN: "978-0596004897",
        handeling: "uitlening",
    },
    {
        ISBN: "978-1491908426",
        handeling: "teruggave",
    },
    {
        ISBN: "978-1449319243",
        handeling: "uitlening",
    },
    {
        ISBN: "978-0596004361",
        handeling: "teruggave",
    },
    {
        ISBN: "978-1491905012",
        handeling: "uitlening",
    },
    {
        ISBN: "978-1449355739",
        handeling: "uitlening",
    },
];
function boekzoeken(ISBN) {
    return catalogus.find(book => book.ISBN === ISBN);
}

dagverloop.forEach(element => {
    const book = boekzoeken(element.ISBN);
    if (element.handeling === "uitlening") {
        if (book && book.aantal > 0) {
            book.aantal--;
            if (book.aantal === 0) {
                catalogus = catalogus.filter(item => item.ISBN !== element.ISBN);
            }
        }
    } else if (element.handeling === "teruggave") {
        if (book) {
            book.aantal++;
        } else {
            catalogus.push({ ISBN: element.ISBN, aantal: 1 });
        }
    }
});
catalogus.forEach(boekid => {
    console.log(`ISBN: ${boekid.ISBN}, aantal: ${boekid.aantal}`);
});

