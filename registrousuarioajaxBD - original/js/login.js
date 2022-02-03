function login() {
	let usuario = {};

	usuario.usu = document.getElementById("usuLog").value;
	usuario.pas = document.getElementById("pasLog").value;

	if(usuario.usu != "" && usuario.pas != ""){
		loginAjax(usuario);
	}else{
		window.location.replace("errorlogin.html");
	}
}

function loginAjax(u) {
	const llamada = new XMLHttpRequest();

	//**********************************************
	//recibir la respuesta
	llamada.onload = function() {

		alert(this.responseText);
    	let resp = JSON.parse(this.responseText);

    	if(resp){
    		window.location.replace("principal.php");
    	}else{
    		window.location.replace("errorlogin.html");
    	}

    }
	//**********************************************

	//**********************************************

	//construir la consulta
	llamada.open("POST", "loginusuarioAjax.php", true);
	llamada.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//ejecutar la consulta
  	llamada.send("usuario="+JSON.stringify(u));
	//**********************************************	
}
