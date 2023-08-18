// Declare some stuff
let myVariable = 42;
const PI = Math.PI;
function areaOfCircle(radius) {
    return PI * Math.pow(radius, 2);
}
// Export the declared stuff
export { myVariable as yourVariable, PI, areaOfCircle };

// Export a function directly
export function ouncesToGrams(oz) {
    return oz * 28.3495;
}

// Set up and then export an expression as the default
const date = new Date();
const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
export default days[date.getDay()];
