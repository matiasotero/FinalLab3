$(document).ready(function(){
	ChequearSesion();
});

function validarLogin()
{
	var nombreAux;
	var usuarioAux;
	var claveAux;

	var tipoDatos = $("#loginType").val();
	alert(tipoDatos);
	if(tipoDatos == "pdo"){
   //var recordarAux; 

   nombreAux= $("#nombre").val();
   usuarioAux= $("#correo").val();	
   claveAux= $("#clave").val();
   //recordarAux= document.getElementById('recordarme').checked;

   if(isNaN(claveAux)){
   	alert("La clave no es numerica.");
   	return;
   }

   var funcionAjax=$.ajax({
   	type: "post",
   	url: "php/validarUsuario.php",
   	data: {
   		nombre: nombreAux,
   		usuario: usuarioAux,
   		clave: claveAux
   			//recordarme: recordarAux
   		}
   	});

   funcionAjax.done(function (respuesta){
   	alert(respuesta);
   	ChequearSesion();
   });
}else if(tipoDatos == "txt"){
   //var recordarAux; 

   nombreAux= $("#nombre").val();
   usuarioAux= $("#correo").val();	
   claveAux= $("#clave").val();
   //recordarAux= document.getElementById('recordarme').checked;

   if(isNaN(claveAux)){
   	alert("La clave no es numerica.");
   	return;
   }

   var funcionAjax=$.ajax({
   	url:"nexo.php",
   	type:"post",
   	data:{
   		queHacer:"LoginTxt",
   		nombre: nombreAux,
   		usuario: usuarioAux,
   		clave: claveAux
   			//recordarme: recordarAux
   		}
   	});

   funcionAjax.done(function (respuesta){
   	alert(respuesta);
   	ChequearSesion();
   });
}
}

function loginWithParameters(nom,mail,clav){
	alert("Logueando como " + nom);
	var nombreAux;
	var usuarioAux;
	var claveAux;

	var tipoDatos = $("#loginType").val();
	alert(tipoDatos);
	if(tipoDatos == "pdo"){
   //var recordarAux; 

   nombreAux= nom;
   usuarioAux= mail;	
   claveAux= clav;
   //recordarAux= document.getElementById('recordarme').checked;

   if(isNaN(claveAux)){
   	alert("La clave no es numerica.");
   	return;
   }

   var funcionAjax=$.ajax({
   	type: "post",
   	url: "php/validarUsuario.php",
   	data: {
   		nombre: nombreAux,
   		usuario: usuarioAux,
   		clave: claveAux
   			//recordarme: recordarAux
   		}
   	});

   funcionAjax.done(function (respuesta){
   	alert(respuesta);
   	ChequearSesion();
   });

}else if(tipoDatos == "txt"){

	nombreAux= nom;
	usuarioAux= mail;	
	claveAux= clav;


	if(isNaN(claveAux)){
		alert("La clave no es numerica.");
		return;
	}

	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"LoginTxt",
			nombre: nombreAux,
			usuario: usuarioAux,
			clave: claveAux
   			//recordarme: recordarAux
   		}
   	});

	funcionAjax.done(function (respuesta){
		alert(respuesta);
		ChequearSesion();
	});
}
}

function validarEmail(valor) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
   //alert("La dirección de email " + valor + " es correcta.");
   return true;
} else {
	alert("La dirección de email es incorrecta.");
	return false;
}
}

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"		
	});
	funcionAjax.done(function(retorno){
			//MostarBotones();
			MostarLogin();
			$("#frameUsuario").html("");
			$("#botonesLogin").html("");
			$("#usuario").val("Sin usuario.");
			$("#BotonLogin").html("Login<br>-Sesión-");
			$("#BotonLogin").removeClass("btn-danger");
			$("#BotonLogin").addClass("btn-primary");
			
		});	
}
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		$("#botonesLogin").html(retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}

function BorrarCookies(){
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"BorrarCookies"}
	});
	funcionAjax.done(function(retorno){
		alert("Cookies Eliminadas: \n" + retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}

function ChequearSesion(){
	var funcionAjax2=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerSession"
		}
	});
	funcionAjax2.done(function(retorno){
		var session = JSON.parse(retorno);
		if(session.usuario != null){
			MostarBotones();
			$("#usuario").val(session.usuario);
		}
	});
	funcionAjax2.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}
