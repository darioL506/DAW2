/* -------------------------------------------------------------------------- */
/*                                  Variables                                 */
/* -------------------------------------------------------------------------- */

let tabla = document.getElementById("tabla");
let nombres = [];
let horas = [];
let turnos = [];
let salarios = [];
let totalSalarios = 0;

/* -------------------------------------------------------------------------- */
/*                                  Funciones                                 */
/* -------------------------------------------------------------------------- */

/* -------------------- Funcion para introducir los datos ------------------- */

function introducirDatos() {
    let continuar; // Bandera para controlar el ciclo
    do {
        let nombre = nombreCorrecto();
        let hora = horasCorrectas();
        let turno = turnoCorrecto();
        continuar = continuarCorrecto();
        grabarTrabajador(nombre, hora, turno);
        calcularSalario(hora, turno);
    } while (continuar != "s");
}

/* --------------------- Funcion para mostrar los datos --------------------- */

function monstrarDatos() {
    let elemento = document.createElement("tr");
    elemento.innerHTML = `
    <th>Nombres</th><th>Horas</th><th>Turno</th><th>Salario</th>
    `;
    tabla.appendChild(elemento);
    for (let i = 0; i < nombres.length; i++) {
        let elemento = document.createElement("tr");
        elemento.innerHTML = `
        <td>${nombres[i]}</td><td>${horas[i]}</td><td>${turnos[i]}</td><td>${salarios[i]}€</td>
        `;
        tabla.appendChild(elemento);
    }
    elemento = document.createElement("tr");
    elemento.innerHTML = `
    <th colspan="2">Total Salarios</th><td colspan="2">${totalSalarios}€</td>
    `;
    tabla.appendChild(elemento);
}

/* ------------------- Funcion para mostrar mensaje promt ------------------- */

function mensajePrompt(mensaje) {
    return prompt(mensaje);
}

/* -------------- Funcion que controla si el nombre esta vacio -------------- */

function nombreCorrecto() {
    let nombreCorrecto;
    do {
        nombreCorrecto = mensajePrompt("Nombre");
    } while (nombreCorrecto === null);
    return nombreCorrecto;
}

/* --------------------- Funcion que controla las horas --------------------- */

function horasCorrectas() {
    let horasCorrectas;
    do {
        horasCorrectas = mensajePrompt("Número de horas");
    } while (isNaN(horasCorrectas));
    return horasCorrectas;
}

/* ------------- Funcion para controlar si el turno es correcto ------------- */

function turnoCorrecto() {
    let turnoCorrecto;
    do {
        turnoCorrecto = mensajePrompt(
            "Turno\nMañanas(m), Tardes (t) o Noches (n)"
        ).toLowerCase();
    } while (
        turnoCorrecto != "m" &&
        turnoCorrecto != "t" &&
        turnoCorrecto != "n"
    );
    return turnoCorrecto;
}

/* ---- Funcion para saber si el usuario quiere continuar con validación ---- */

function continuarCorrecto() {
    let continuarCorrecto;
    do {
        continuarCorrecto = mensajePrompt(
            "¿Desea continuar o salir?\nConinuar (c) - Salir (s)"
        ).toLowerCase();
    } while (continuarCorrecto != "s" && continuarCorrecto != "c");
    return continuarCorrecto;
}

/* ------- Funcion para ir añadiendo los datos a los diferentes Arrays ------ */

function grabarTrabajador(nombre, hora, turno) {
    nombres.push(nombre);
    horas.push(hora);
    turnos.push(turno);
}

/* ------------------- Funcion para calcular los salarios ------------------- */

function calcularSalario(hora, turno) {
    let salarioTotal;
    let salarioDescuento;
    switch (turno) {
        case "m":
            salarioTotal = hora * 15;
            break;
        case "t":
            salarioTotal = hora * 17;
            break;
        case "n":
            salarioTotal = hora * 20;
            break;
        default:
            break;
    }
    salarioDescuento = descuentoSalario(salarioTotal);
    totalSalarios += salarioDescuento;
    salarios.push(salarioDescuento);
}

/* ----------- Funcion para calcular los descuentos de los salario ---------- */

function descuentoSalario(salarioTotal) {
    let salarioDescuento;
    if (salarioTotal < 600) {
        salarioDescuento = salarioTotal - salarioTotal * 0.08;
    } else if (salarioTotal >= 600 && salarioTotal <= 1000) {
        salarioDescuento = salarioTotal - salarioTotal * 0.1;
    } else if (salarioTotal > 10000) {
        salarioDescuento = salarioTotal - salarioTotal * 0.12;
    }
    return salarioDescuento;
}

/* -------------------------------------------------------------------------- */
/*                                  Ejecución                                 */
/* -------------------------------------------------------------------------- */

/* --------------------------- Intro del programa --------------------------- */

alert(
    "CALCULO SALARIOS\nIntroduzca nombre, salario y turno de\nlos trabajadores para calcular el sario\nteclee salir para finalizar la introduccion"
);

/* -------------------------- Introducción de datos ------------------------- */

introducirDatos();
monstrarDatos();