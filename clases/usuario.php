<?php
class usuario
{
	public $id;
 	public $nombre;
  	public $mail;
  	public $contraseña;

	 //  public function ModificarUsuarioParametros()
	 // {
		// 	$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		// 	$consulta =$objetoAccesoDato->RetornarConsulta("
		// 		UPDATE usuario 
		// 		SET nombre=:nombre,
		// 		mail=:mail,
		// 		contraseña=:contrasenia");

		// 	$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
		// 	$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
		// 	$consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
		// 	$consulta->bindValue(':contrasenia', $this->contraseña, PDO::PARAM_STR);
		// 	$consulta->bindValue(':fotoRuta', $this->fotoRuta, PDO::PARAM_STR);
		// 	return $consulta->execute();
	 // }

	 // public function GuardarUsuario()
	 // {
	 // 	$this->ModificarUsuarioParametros();
	 // }


  	public static function TraerTodoLosUsuarios()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, mail as mail,contraseña as contraseña");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "usuario");		
	}

	public static function TraerUnUsuario($mail) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, mail as mail,contraseña as contraseña from usuario where mail = '$mail'");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;	
	}
	public static function TraerUnUsuarioPorNombre($nombre) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, mail as mail,contraseña as contraseña from usuario where nombre = '$nombre'");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;	
	}
	public static function TraerUnUsuarioPorId($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, mail as mail,contraseña as contraseña from usuario where id = '$id'");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;	
	}


}