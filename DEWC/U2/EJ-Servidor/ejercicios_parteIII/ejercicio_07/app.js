/* -------------------------------------------------------------------------- */
/*                                  Variables                                 */
/* -------------------------------------------------------------------------- */
var ventanaHija;
var ventadaPadre = window.opener;

/* -------------------------------------------------------------------------- */
/*                                  Funciones                                 */
/* -------------------------------------------------------------------------- */

// Funcion para crear la ventana
function crearVentana() {
    let opciones = "toolbar=0, location=0, directories=0, status=0,";
    opciones += "menubar=0, scrollbars=0, resizable=0, copyhistory=0,";
    opciones += "width=500, height=500, left=700";
    ventanaHija = window.open("ventana_hija.html", "ventanaHija", opciones);
}

// Funcion para enviar mensaje al hijo
function enviarHijo() {
    let mensaje = document.getElementById('texto_padre').value;
    ventanaHija.document.getElementById('texto_hija').innerHTML = mensaje;
    ventanaHija.focus();
}

// Función para enviar mensaje al padre
function enviarPadre(params) {
    let mensaje = document.getElementById('texto_hija').value;
    window.opener.document.getElementById('texto_padre').innerHTML = mensaje;
}

/* -------------------------------------------------------------------------- */
/*                                 Explicación                                */
/* -------------------------------------------------------------------------- */
/*
    He estado investigando un poco, y se puede hacer mediante el método windows.open
    al crear una nueva ventana desde el padre lo hago mediante un identificador, con
    el cual puedo acceder la nueva ventana y maniputarlar.
    Para acceder al padre lo hago mediante el intendificado que se crea al abrir la hija
    este identificador lo tengo en windows.opener.
*/