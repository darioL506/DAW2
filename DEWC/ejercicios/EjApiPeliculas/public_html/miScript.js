

$('#btnBusqueda').on('click', function(){
    var busqueda = $('#busqueda').val();
    $.ajax({
        url: 'http://www.omdbapi.com/?i=tt3896198&apikey=ac94af75',    
        jsonp: "callback",
        data: {
            s: busqueda,
            r: 'json'
        },
        success: cargarPeliculas
    });
});

function cargarPeliculas(data) {
    var search = data.Search;
    
    var zonaPelis =  $('#peliculas'); 
    zonaPelis.html('');
    $.each(search, function(i,pelicula){
        zonaPelis.append(formaPeli(pelicula));
    });    
}

function formaPeli(pelicula) {
    var texto = $('<ul>');
    var nombre = $('<li>');
    nombre.html('<b>Nombre</b>: '+ pelicula.Title+'</li>');
    texto.append(nombre); 
    var cartel = $('<li>');
    cartel.html('<img src="'+pelicula.Poster+'"></li>')
    texto.append(cartel);    
    console.log(texto);
    return texto;
}





