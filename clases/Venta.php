<?php
class Venta{
    public $id;
    public $mail;
    public $sabor;
    public $tipo;
    public $peso;
    public $pathFoto;

    function ToString(){
      $objToString = $this->mail."|".$this->sabor."|".$this->tipo."|".$this->peso;
		if($this->pathFoto === NULL){
			return $objToString."\n";
		}
		else {
      $objToString = $objToString.$this->pathFoto."\n";
      return objToString.$pathFoto."\n";
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
  
  // public static function GuardarArrayVentaTxt($arrayVentas){
  //   $archivo = fopen("Ventas.txt", "w");
  //   for($i=0; $i < count())
  // }

}
?>