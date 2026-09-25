const numAle = Math.random() * 100 + 1;

let num = 0;
let cont = 0;
let continuar = true;

while (continuar == true) {
  //numaAle != num || cont == 0 ||
  num = prompt("Introduce el número o escribe " / Cancelar / "");

  if (isNaN(num) == false) {
    //si el parametro es un numero devuelve false
    num = Number(num);
    //isNaN para comprobar se es un numero
    if (num < numAle) {
      console.log("El numero introducido menor");
      cont = cont + 1;
    } else if (num > numAle) {
      console.log("El numero introducido es mayor");
      cont = cont + 1;
    } else {
      console.log("Has acertado");
      console.log("Has tardado ", cont, " intentos");
      seguir = prompt("Quieres volver a jugar? Escribe Si o No");
      if (seguir == "No") {
        continuar = false;
      }
    }
  } else if (num == "Cancelar") {
    console.log("Se termino el juego");
    continuar = false;
  } else {
    console.log("No has introducido un número");
    //continuar = true;
  }
}
