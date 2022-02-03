function registraTema() {

	let tema = [];
	tema.push(document.getElementById("titulo").value);
	tema.push(document.getElementById("texto").value);


	const llamada = new XMLHttpRequest();

	//**********************************************
	//recibir la respuesta
	llamada.onload = function() {

    	let resp = JSON.parse(this.responseText);

    	if(resp){
    		window.location.replace("principal.php");
    	}else{
    		window.location.replace("errorTema.php");
    	}

    }
	//**********************************************

	//**********************************************

	//construir la consulta
	llamada.open("POST", "registraTema.php", true);
	llamada.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//ejecutar la consulta
  	llamada.send("tema="+JSON.stringify(tema));
	//**********************************************	
}
