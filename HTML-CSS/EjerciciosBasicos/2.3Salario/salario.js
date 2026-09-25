const nombre = prompt("Introduce tu nombre");
const ape = prompt("Introduce tus apellidos");
let sal = parseFloat(prompt("Introduce tu salario"));
const edad = Number(prompt("Introduce tu edad"));

if (sal > 1000 && sal < 2000) {
  if (edad > 45) {
    sal = sal + sal * 0.03;
  } else {
    sal = sal + sal * 0.1;
  }
}

if (sal < 1000) {
  if (edad < 30) {
    sal = 1100;
  } else if (edad > 30 && edad < 45) {
    sal = sal + sal * 0.03;
  } else {
    sal = sal + sal * 0.15;
  }
}

alert(`${nombre}  ${ape} con edad ${edad}: ${sal}`);
