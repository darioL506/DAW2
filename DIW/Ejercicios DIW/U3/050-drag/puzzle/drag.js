eventosCasillas();
eventosFichas();

function eventosCasillas(){

    var casillas = document.querySelectorAll(".tablero div");
    //console.log(casillas.length);
    for(i=0; i < casillas.length;i++){

        casillas[i].addEventListener("dragover", 
            function (event) {
                event.preventDefault();
            });

        casillas[i].addEventListener("drop",
            function(event) 
            {
                event.preventDefault();
                // Comprobamos que no caemos sobre otra ficha
                // Y si caemos sobre una casilla vacia pues añadimos la ficha como hijo
                var idDrop = event.target.id;
                
                if( !idDrop.startsWith("ficha")){

                    var ficha = document.getElementById(
                        event.dataTransfer.getData("text")
                    );

                    event.target.appendChild(ficha);
                }

                
            });
    }
}


function eventosFichas(){

    var fichas = document.querySelectorAll(".arrastrables div");
    
    for(i=0; i < fichas.length;i++){

        // Cuando hacemos drag guardamos el id del elemento 
        fichas[i].addEventListener("dragstart",
            function (event){
                event.dataTransfer.setData("text", event.target.id);
            });

        // Al hacer click en la ficha se gira. Para ello usamos el 
        // atributo data-grados que indica la posición que tiene la ficha
        fichas[i].addEventListener("click",
            function (event){
                var grados = event.target.getAttribute("data-grados");
                grados = parseInt(grados,10) + 90;
                event.target.setAttribute("data-grados",grados);
                event.target.style.transform = "rotate("+grados+"deg)";
                //var ancho = event.target.offsetWidth;
                //var alto = event.target.offsetHeight;
                //event.target.style.width = alto+"px";
                //event.target.style.height = ancho+"px";

            });

        // Detectamos que la transición a terminado para modificar el tamaño
        // del objeto contendor.
        fichas[i].addEventListener("transitionend", function(event) {
                var padre = document.getElementById(event.target.parentNode.id);
                padre.style.width = event.target.getBoundingClientRect().width+"px";
                padre.style.height = event.target.getBoundingClientRect().height+"px";
                
            });

    }
}
