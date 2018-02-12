<?php
class Helado
{
	public $id;
 	public $sabor;
	public $precio;
	public $tipo;
	public $peso;
	public $pathFoto;

	public function ModificarProductoParametros()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				UPDATE producto 
				SET nombre=:nombre,
				porcentaje=:porcentaje
				WHERE idProducto=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':porcentaje', $this->porcentaje, PDO::PARAM_STR);
			return $consulta->execute();
	}

	 public function InsertarElProductoParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into producto (nombre,porcentaje)values(:nombre,:porcentaje)");
				$consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
				$consulta->bindValue(':porcentaje', $this->porcentaje, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 public function GuardarProducto()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarProductoParametros();
	 		}else {
	 			$this->InsertarElProductoParametros();
	 		}

	 }

	   	public function BorrarProducto()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from producto 				
				WHERE idProducto=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }


  	public static function TraerTodoLosProductos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select idProducto as id,nombre as nombre,porcentaje as porcentaje from producto");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "producto");		
	}

	public static function TraerUnProducto($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select idProducto as id,nombre as nombre,porcentaje as porcentaje from producto where idProducto = '$id'");
			$consulta->execute();
			$productoBuscado= $consulta->fetchObject('producto');
			return $productoBuscado;	
	}

	function ToString(){
		$objToString = $this->id."|".$this->sabor."|".$this->precio."|".$this->tipo."|".$this->peso;
		if($this->pathFoto === NULL){
			return $objToString."\n";
		}
		else {
			$objToString = $objToString.$this->pathFoto."\n";
		}
	}

	public static function BuscarHelado($sabor, $tipo){
		$arrayHelados = Helado::TraerTodosLosHeladosTxt();

		$sabor = strtolower($sabor);
		$tipo = strtolower($tipo);
		
		$message = "No existe ese helado en stock";
		$isAny = false;

		if(count($arrayHelados) != 0){
			for($i=0; $i < count($arrayHelados); $i++){
				if($sabor == strtolower($arrayHelados[$i][1]) && $tipo == strtolower($arrayHelados[$i][3])){
					$message = "Si hay";
					$isAny = true;
				}
			}

			if(!$isAny){
				for($n=0; $n < count($arrayHelados); $n++){
					if($sabor != strtolower($arrayHelados[$n][1]) && $tipo == strtolower($arrayHelados[$n][3])){
						return $message = "Existe el tipo pero no el sabor";
					}	
					else{
						if($sabor == strtolower($arrayHelados[$n][1]) && $tipo != strtolower($arrayHelados[$n][3])){
							return $message = "Existe el sabor pero no el tipo";
						}
					}					
				}
			}
		}
		return $message;
	}

	public function GuardarHelado(){
		$exist = false;
		$archivo=fopen("Helados.txt", "r");
			while (!feof($archivo)) {
				$linea = fgets($archivo);
				if($linea != ""){
					$arrayData = explode('|', $linea);
					if(strtolower($this->sabor) == strtolower($arrayData[1]) && strtolower($this->tipo) == strtolower($arrayData[3])){
						echo "ERROR: El helado YA EXISTE";
						$exist = true;
						break;
					}					
					$this->id = $this->id + 1;					
				}
			}
			if(!$exist){
				$archivo = fopen("Helados.txt", "a");
				fwrite($archivo, $this->ToString());
				echo "HELADO GUARDADO CON EXITO";
			}			
			fclose($archivo);
	}

	public static function EntregarMercaderia($sabor, $tipo ,$peso){
		$pesoToInt = (int)$peso;
		$arrayHelados = Helado::TraerTodosLosHeladosTxt();
		for($i = 0 ;$i < count($arrayHelados); $i++){
			if(strtolower($sabor) == strtolower($arrayHelados[$i][1]) && strtolower($tipo) == strtolower($arrayHelados[$i][3])){
				$pesoHelado = (int)$arrayHelados[$i][4];
				if($pesoHelado >= $pesoToInt){
					$arrayHelados[$i][4] = $pesoHelado - $pesoToInt;
					Helado::GuardarArrayEnTxt($arrayHelados);
					return "Se realizo la operación exitosamente!";
				}
				else{					
					return "No hay cantidad suficiente!";
				}
			}
		}
	}

	public static function TraerTodosLosHeladosTxt(){
		$arrayHelados = [];
		$archivo = fopen("Helados.txt","r");
		while(!feof($archivo)){
			$linea = fgets($archivo);
			if($linea != ""){
				$arrayData = explode("|",$linea);
				$arrayData[4] = trim($arrayData[4]);
				array_push($arrayHelados,$arrayData);
			}
		}
		fclose($archivo);
		return $arrayHelados;
	}

	public static function GuardarArrayEnTxt($arrayHelados){
		$archivo = fopen("Helados.txt","w");
		for($i = 0; $i < count($arrayHelados); $i++){
			$arrayHelados[$i][4] = $arrayHelados[$i][4]."\n";
			$linea = implode("|", $arrayHelados[$i]);
			fwrite($archivo, $linea);
		}
		fclose($archivo);
	}
}