eventosCasillas();
eventosFichas();

/**
 * Cuando arrastramos una ficha recogemos su id en el evento
 */
function eventosFichas() {

    var fichas = document.querySelectorAll(".arrastrables div");

    for (i = 0; i < fichas.length; i++) {
        fichas[i].addEventListener("dragstart",
            function (event) {
                event.dataTransfer.setData("text", event.target.id);
            });
    }
}


/**
 * Cuando una ficha caiga en una casilla, usando el id de la ficha que pasamos en el comienzo del arrastre
 * buscamos el elemento y lo añadimos como hijo de la ficha.
 */
function eventosCasillas() {

    var casillas = document.querySelectorAll(".tablero div");

    for (i = 0; i < casillas.length; i++) {

        // Evitamos el comportamiento por defecto
        casillas[i].addEventListener("dragover",
            function (event) {
                event.preventDefault();
            }
        );

        casillas[i].addEventListener("drop",
            function (event) {
                event.preventDefault();

                var ficha = document.getElementById(
                    event.dataTransfer.getData("text")
                );

                event.target.appendChild(ficha);

            });
    }
}