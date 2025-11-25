const uren = [
    [7, 4, 6, 8],
    [6, 8, 5],
    [5, 5, 8, 7, 6],
    [8, 6, 5, 8, 5],
];


let totaal = 0;
for (let i = 0; i < uren.length; i++) {
    let totaluur = 0;
    for (const num of uren[i]) {
        totaluur += num;
    }
    totaal += totaluur;
    console.log(`Week ${i + 1}: ${totaluur} uur`);
}
console.log(`Totaal: ${totaal} uur`);
