let data = ["Hello", 3, 3.2, "3", true, false, 3.0 + 3, 3 + "3"];
for (let i = 0; i < data.length; i++) {
    let element = data[i];
    let elementype = "";
    if ((typeof data[i]) === "number") {
        if (Number.isInteger(data[i])) {
            elementype = "number int";
        } else {
            elementype = "number float";
        }
    } else {
        elementype = (typeof data[i]);
    }
    console.log(`Waarde ${element} heeft als type ${elementype}`);
}