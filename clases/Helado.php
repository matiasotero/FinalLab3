<?php
class Helado
{
	public $id;
 	public $sabor;
	public $precio;
	public $tipo;
	public $peso;
	public $pathFoto;

	function ToString(){
		$objToString = $this->id."|".$this->sabor."|".$this->precio."|".$this->tipo."|".$this->peso;
		if($this->pathFoto == NULL){
			return $objToString."\n";
		}
		else {
			return $objToString = $objToString."|".$this->pathFoto."\n";
		}
	}	

	public function GuardarHelado($isModification){
		$exist = false;
		
		$arrayHelados = Helado::TraerTodosLosHeladosTxt();
		$arrayFiltrado = [];
		$cont = 0;
		foreach($arrayHelados as $helado){
			if(strtolower($this->sabor) == strtolower($helado->sabor) && strtolower($this->tipo) == strtolower($helado->tipo)){
				if(!$isModification){
					echo "ERROR: El helado YA EXISTE";
					$exist = true;
					break;
				}
				else{
					$this->id = $cont;
					array_push($arrayFiltrado, $this);
				}
			}
			else{
				array_push($arrayFiltrado, $helado);
			}
			$cont++;
		}		
		if(!$exist){	
			if(!$isModification){
				$this->id = $cont;
				array_push($arrayFiltrado, $this);
			}	
			Helado::GuardarArrayEnTxt($arrayFiltrado);
			echo "HELADO GUARDADO CON EXITO";
		}
	}

	public static function EntregarMercaderia($sabor, $tipo ,$peso){
		$pesoToInt = (int)$peso;
		$arrayHelados = Helado::TraerTodosLosHeladosTxt();
		for($i = 0 ;$i < count($arrayHelados); $i++){
			if(strtolower($sabor) == strtolower($arrayHelados[$i]->sabor) && strtolower($tipo) == strtolower($arrayHelados[$i]->tipo)){
				$pesoHelado = (int)$arrayHelados[$i]->peso;
				if($pesoHelado >= $pesoToInt){
					$arrayHelados[$i]->peso = $pesoHelado - $pesoToInt;
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
				$helado = new Helado();
				$helado->id = $arrayData[0];
				$helado->sabor = $arrayData[1];
				$helado->precio = $arrayData[2];
				$helado->tipo = $arrayData[3];
				$helado->peso = trim($arrayData[4]);
				$helado->pathFoto = isset($arrayData[5]) ? $arrayData[5] : NULL;
				array_push($arrayHelados,$helado);
			}
		}
		fclose($archivo);
		return $arrayHelados;
	}

	public static function GuardarArrayEnTxt($arrayHelados){
		$archivo = fopen("Helados.txt","w");
		foreach($arrayHelados as $helado){
			fwrite($archivo, $helado->ToString());
		}
		fclose($archivo);
	}

	public static function TraerUnHelado($sabor, $tipo){
		$arrayHelados = [];
		if(Helado::BuscarHelado($sabor, $tipo) == "Si hay"){
			$arrayHelados = Helado::TraerTodosLosHeladosTxt();

			foreach($arrayHelados as $helado){
				if(strtolower($helado->sabor) == strtolower($sabor) && strtolower($helado->tipo) == strtolower($tipo)){
					return $helado;
				}
			}
		}
		else{
			return null;
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
				if($sabor == strtolower($arrayHelados[$i]->sabor) && $tipo == strtolower($arrayHelados[$i]->tipo)){
					$message = "Si hay";
					$isAny = true;
				}
			}

			if(!$isAny){
				for($n=0; $n < count($arrayHelados); $n++){
					if($sabor != strtolower($arrayHelados[$n]->sabor) && $tipo == strtolower($arrayHelados[$n]->tipo)){
						return $message = "Existe el tipo pero no el sabor";
					}	
					else{
						if($sabor == strtolower($arrayHelados[$n]->sabor) && $tipo != strtolower($arrayHelados[$n]->tipo)){
							return $message = "Existe el sabor pero no el tipo";
						}
					}					
				}
			}
		}
		return $message;
	}
}