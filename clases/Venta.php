<?php
class Venta{
    public $id;
    public $mail;
    public $sabor;
    public $tipo;
    public $peso;
    public $pathFoto;

    public function __construct(){

    }

    public static function InicializateVenta($id = 0, $mail, $sabor, $tipo, $peso, $pathFoto = NULL){
      $instance = new self();
      $instance->id = $id;
      $instance->mail = $mail;
      $instance->sabor = $sabor;
      $instance->tipo = $tipo;
      $instance->peso = $peso;
      $pathFoto->pathFoto = $pathFoto;
      return $instance;
    } 

    function ToString(){
      $objToString = $this->id."|".$this->mail."|".$this->sabor."|".$this->tipo."|".$this->peso;
		  if($this->pathFoto === NULL){
			  return $objToString."\n";
		  }
		  else {
        return $objToString."|".$this->pathFoto."\n";
		  }
  }
  
  public function GuardarVenta(){
    if(!file_exists("Ventas.txt")){
      $archivoNuevo = fopen("Ventas.txt","x");
      fclose($archivoNuevo);
    }
    $this->id = 0;
    $archivo = fopen("Ventas.txt", "r");
    while(!feof($archivo)){
      $linea = fgets($archivo);
      if($linea != ""){
        $this->id++;
      }
    }
    $archivo = fopen("Ventas.txt", "a");
    fwrite($archivo, $this->ToString());
    fclose($archivo);
  }

  public static function TraerTodasLasVentasTxt(){
    $archivo = fopen("Ventas.txt","r");
    $arrayVentas = [];
    while(!feof($archivo)){
      $linea = fgets($archivo);
      if($linea != ""){
        $arrayData = explode("|", $linea);
        $venta = new Venta();
        $venta->id = $arrayData[0];
        $venta->mail = $arrayData[1];
        $venta->sabor = $arrayData[2];
        $venta->tipo = $arrayData[3];
        $venta->peso = $arrayData[4];
        $venta->pathFoto = isset($arrayData[5]) ? trim($arrayData[5]) : NULL;
        array_push($arrayVentas, $venta);
      }
    }
    fclose($archivo);
    return $arrayVentas;
  }
  
  // public static function GuardarArrayVentaTxt($arrayVentas){
  //   $archivo = fopen("Ventas.txt", "w");
  //   for($i=0; $i < count())
  // }

}
?>