<?php 
session_start();//es habilitar el acceso a una variable super global , un array de lo que nosotros querramos
require_once("../clases/AccesoDatos.php");
require_once("../clases/usuario.php");

$nombre = $_POST['nombre'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
//$recordar=$_POST['recordarme'];

$retorno;

//BUSCO POR EMAIL
$miUsuario = usuario::TraerUnUsuario($usuario);
if($miUsuario == null){
	//BUSCO POR NOMBRE
	$miUsuario = usuario::TraerUnUsuarioPorNombre($nombre);
}

if($miUsuario != null){
	if($clave == $miUsuario->contraseña){
		// if($recordar=="true"){
			// setcookie("registroId",$miUsuario->id,  time()+60 , '/');
			// setcookie("registroNombre",$miUsuario->nombre,  time()+60 , '/');
			// setcookie("registroMail",$miUsuario->mail,  time()+60 , '/');
			// setcookie("registroContraseña",$miUsuario->contraseña,  time()+60 , '/');	
			//setcookie("registroFoto",$miUsuario->fotoRuta,  time()+60 , '/');
		//} else {
/*			setcookie("registroId",$miUsuario->id,  time()-600 , '/');	
			setcookie("registroNombre",$miUsuario->nombre,  time()-600 , '/');	
			setcookie("registroMail",$miUsuario->mail,  time()-600 , '/');	
			setcookie("registroContraseña",$miUsuario->contraseña,  time()-600 , '/');	
			setcookie("registroFoto",$miUsuario->fotoRuta,  time()-600 , '/');	*/
		//}
		//$_SESSION['registrado']="octavio";
		$_SESSION['id'] = $miUsuario->id;
		$_SESSION['usuario'] = $miUsuario->nombre;	
		$_SESSION['mail'] = $miUsuario->mail;	
		$_SESSION['clave'] = $miUsuario->contraseña;
		//$_SESSION['foto'] = $miUsuario->fotoRuta;
	}

	$retorno= (isset($_SESSION['usuario']) ? $_SESSION['usuario'] : "Datos Incorrectos" );
}else {
	$retorno= "Usuario Inexistente";
}

echo $retorno;
?>