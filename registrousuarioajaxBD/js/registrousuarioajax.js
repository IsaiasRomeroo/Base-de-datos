


function registrar (){

    let usuario ={};
	

	usuario.nombre=document.getElementById('nom').value;
	usuario.apellidos=document.getElementById('ape').value;
	usuario.correo=document.getElementById('ema').value;
	usuario.usuario=document.getElementById('usu').value;
	usuario.contrasena=document.getElementById('pass').value;

 		if(usuario.usuario!=""&& usuario.contrasena!=""&& usuario.correo!="" ){
  		cambiaPost(usuario)

 		}else{
 			windows.location.replace("error.html");
 		}
	
 }
 

 function cambiaPost(u) {

	console.log("funcion cambia");

	const llamada = new XMLHttpRequest();

	//recibir la respuesta

	llamada.onload= function(){
alert(this.responseText);
		let resp=JSON.parse(this.responseText);


		if(resp){
			document.getElementById("salida").innerHTML="Usuario registrado";

		}else{
			window.location.replace("error.html");
		}

		console.log (this.responseText);
		//construir la consulta
			

	}

	llamada.open("POST","registrousuarios.php",true);
	llamada.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	//ejecutar la consulta
	llamada.send("usu="+JSON.stringify(u));

 }