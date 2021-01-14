eventosCasillas();
eventosFichas();

function eventosCasillas(){

    var casillas = document.querySelectorAll("#tablero div");
    console.log(casillas.length);
    for(i=0; i < casillas.length;i++){

        casillas[i].addEventListener("dragover", 
            function (event) {
                event.preventDefault();
            });

        casillas[i].addEventListener("drop",
            function(event) 
            {
                event.preventDefault();
                
                var ficha = document.getElementById(
                    event.dataTransfer.getData("text")
                    );
                
                event.target.appendChild(ficha);
                
            });
    }
}


function eventosFichas(){

    var fichas = document.querySelectorAll(".ficha");
    
    for(i=0; i < fichas.length;i++){
        fichas[i].addEventListener("dragstart",
            function (event){
                event.dataTransfer.setData("text", event.target.id);
            });
    }
}
