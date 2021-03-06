<?php 
session_start();
require_once("clases/AccesoDatos.php");
require_once("clases/usuario.php");
require_once("clases/Helado.php");
require_once("clases/archivo.php");

//var_dump($_POST);
$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'foto':
		include("partes/imagen.php");
		break;
	case 'video':
			include("partes/video.html");
		break;	
	case 'MostarBotones':
			include("partes/botonesABM.php");
		break;
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/HeladoCarga.php");
		break;
	case 'MostrarFormUsuario':
			include("partes/formUsuario.php");
		break;
	case 'MostrarAltaVenta':
		include("partes/AltaVenta.php");
		break;
	case 'MostrarConsultaHelado':
		include("partes/ConsultarHelado.php");
		break;
	case 'MostrarAltaVenta':
		include("partes/AltaVenta.php");
		break;
	case 'MostrarCargaHelado':
		include("partes/HeladoCarga.php");
		break;
	case 'BorrarProducto':
			$producto = new producto();
			$producto->id=$_POST['id'];
			$cantidad=$producto->BorrarProducto();
			echo $cantidad;
		break;
	case 'GuardarProducto':
			$producto = new producto();
			$producto->id=$_POST['id'];
			$producto->nombre=$_POST['nombre'];
			$producto->porcentaje=$_POST['porcentaje'];
			$cantidad=$producto->GuardarProducto();
			echo $cantidad;
		break;		
	case 'GuardarUsuario':
			$usuario = new usuario();
			$usuario->id=$_POST['id'];
			$usuario->nombre=$_POST['nombre'];
			$usuario->mail=$_POST['mail'];
			if($_POST['contr'] != "" && $_POST['contr'] == $_SESSION['clave'] && $_POST['newContr'] != null ){
				$usuario->contraseña=$_POST['newContr'];
			}else{
				$usuario->contraseña=$_SESSION['clave'];
			}
			$usuario->fotoRuta=$_POST['fotoRuta'];
			$cantidad=$usuario->GuardarUsuario();
			echo $cantidad;
		break;
	case 'GuardarProductoTxt':
			$miHelado = new Helado();
			$miHelado->id = 0;
			
			$miHelado->sabor = $_POST['sabor'];
			$miHelado->precio = $_POST['precio'];
			$miHelado->tipo = $_POST['tipo'];
			$miHelado->peso = $_POST['peso'];

			$miHelado->GuardarHelado();
		break;
	case 'LoginTxt':
			$nombre = $_POST['nombre'];
			$mail = $_POST['usuario'];
			$pass = $_POST['clave'];
			if($nombre == "" || $mail == "" || $pass == ""){
				error_log("CAMPO VACIO");
				return;
			}
			$archivo = fopen("ListaUsuarios.txt", "r");
			while (!feof($archivo)) {
				$linea = fgets($archivo);
				$arrayData = explode('|', $linea);
				if($nombre == $arrayData[1] && $mail == $arrayData[2] && $pass == $arrayData[3]){
					$_SESSION['id'] = $arrayData[0];
					$_SESSION['usuario'] = $arrayData[1];	
					$_SESSION['mail'] = $arrayData[2];	
					$_SESSION['clave'] = $arrayData[3];
					echo "LOG_OK";
					return;
				}
			}
			fclose($archivo);
			echo "LOG_WRONG";
			break;
	case 'TraerProducto':
			$producto = producto::TraerUnProducto($_POST['id']);		
			echo json_encode($producto) ;
		break;
	case 'TraerUsuario':
			$usuario = usuario::TraerUnUsuarioPorId($_POST['id']);		
			echo json_encode($usuario) ;
		break;
	case 'TraerSession':
			echo json_encode($_SESSION);
		break;
	case "subirFoto":
		// if(isset($_POST['fotoAnterior'])){
		// 	$fotoAnterior = $_POST['fotoAnterior'];
		// 	if($fotoAnterior != null && $fotoAnterior != "null" && $fotoAnterior != "" && $fotoAnterior != "undefined"){
		// 		unlink("tmp/"+$fotoAnterior);
		// 	} 
		// }
		$res = Archivo::Subir();
		echo json_encode($res);
		break;
	case "BorrarCookies":
			setcookie("registroId","",  time()-600 , '/');	
			setcookie("registroNombre","",  time()-600 , '/');	
			setcookie("registroMail","",  time()-600 , '/');	
			setcookie("registroContraseña","",  time()-600 , '/');	
			setcookie("registroFoto","",  time()-600 , '/');
			echo "OK";
			break;
	case 'ConsultarHelado':	
			$_sabor = strtolower($_POST['sabor']);
			$_tipo = strtolower($_POST['tipo']);
			echo Helado::BuscarHelado($_sabor,$_tipo);
			//echo json_encode(Helado::TraerTodosLosHeladosTxt());	
		break;
	case "GuardarVenta":
		$venta = $_POST["venta"];
		$sabor = $venta["sabor"];
		$tipo = $venta["tipo"];
		$mail = $venta["mail"];
		$peso = $venta["peso"];
		
		if(Helado::BuscarHelado($sabor,$tipo) == "Si hay"){
			echo Helado::EntregarMercaderia($sabor, $tipo, $peso);
		}
		else{
			echo "No hay helado!";
		}
		break;
	default:
		# code...
		break;
}

 ?>