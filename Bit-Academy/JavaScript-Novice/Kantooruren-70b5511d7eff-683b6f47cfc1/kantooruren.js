const uren = [
    {
        bellen: 3,
        emails: 4,
        meetings: 1,
    },
    {
        bellen: 3,
        emails: 3,
        meetings: 2,
    },
    {
        bellen: 3,
        emails: 5,
    },
    {
        bellen: 2,
        emails: 4,
        meetings: 2,
    },
    {
        bellen: 3,
        emails: 2,
    },
];
let totbellen = 0;
let totemail = 0;
let totmeeting = 0;

for (const value of uren) {
    totbellen += value.bellen || 0;
    totemail += value.emails || 0;
    totmeeting += value.meetings || 0;
}
let totaal = totbellen + totemail + totmeeting;

console.log(`Totaal bellen: ${totbellen}`);
console.log(`Totaal emails: ${totemail}`);
console.log(`Totaal meetings: ${totmeeting}`);
console.log(`Totaal: ${totaal} `);
