
function consultaBD(login, pass){
	/* Hariamos una consulta a la base para recuperar los logins */
	var logins = [['diego','virgen*2'],['manolito','asdf'],['pepa','pepa*2']];

	for(var i=0;i<logins.length;i++){
		if(logins[i][0] == login && logins[i][1] == pass )
			return true;
		}

	return false;	
}

document.querySelector("#enviar").addEventListener("click", 
	function() {

	    var login = document.querySelector("#login");
	    var pass = document.querySelector("#pass");

	    if( consultaBD(login.value,pass.value) )
			window.open('feedback.html');
	});