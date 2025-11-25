function errors() {
    try {
        let num = 10;
        num(); 
    } catch (error) {
        console.log("Er is een error gevonden!");
        console.log(`- ErrorType: "${error.name}"`);
        console.log(`- Message: "${error.message}"`);
    }

    try {
        console.log(nietBestaandeVariabele);
    } catch (error) {
        console.log("Er is een error gevonden!");
        console.log(`- ErrorType: "${error.name}"`);
        console.log(`- Message: "${error.message}"`);
    }

    try {
        let  = new Array(-5);
    } catch (error) {
        console.log("Er is een error gevonden!");
        console.log(`- ErrorType: "${error.name}"`);
        console.log(`- Message: "${error.message}"`);
    }
}

errors();
