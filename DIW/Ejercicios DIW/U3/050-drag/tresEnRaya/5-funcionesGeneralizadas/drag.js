var casillas = document.querySelectorAll(".tablero div");
var fichas = document.querySelectorAll(".arrastrables1 div");
var fichas2 = document.querySelectorAll(".arrastrables2 div");
    
hacerDropable(casillas);
hacerDragable(fichas);
hacerDragable(fichas2);

/*  
 *  Hace que se pueda soltar encima de un elemento.
 *  Al soltar encima un elemento que sea dragable se inserta un hijo haciendo uso del id
 *  que se guardó.
 */
function hacerDropable(listaElementos){
    
    listaElementos.forEach( elemento =>{
        
        // Desactivamos la acción por defecto de dragover
        elemento.ondragover = function (event) {
            event.preventDefault();
        }

        // Recuperamos el elemento mediante su id y los insertamos con appendChild
        elemento.ondrop = function(event) {
            event.preventDefault();
            
            event.target.appendChild(
                document.getElementById(
                    event.dataTransfer.getData("text")
                )
            );
            
        }
    });
}

/* 
 *  Hace arrastrables a todos los elementos de la lista. 
 *  Al arrastrar un elemento se guarda su id.
 */
function hacerDragable(listaElementos){

    listaElementos.forEach( elemento =>{
        elemento.setAttribute( 'draggable', true );
        elemento.ondragstart = 
            function (event){
                event.dataTransfer.setData("text", event.target.id);
            };
    });
}
