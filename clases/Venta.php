<?php
class Venta{
    public $mail;
    public $sabor;
    public $tipo;
    public $peso;
    public $pathFoto;

    function ToString(){
      $objToString = $this->mail."|".$this->sabor."|".$this->tipo."|".$this->peso."\n";
		if($this->pathFoto === NULL){
			return $objToString."\n";
		}
		else {
      $objToString = $objToString.$this->pathFoto."\n";
      return objToString.$pathFoto."\n";
		}
  }
  
  public static function GuardarVentaTxt($arrayVentas){
    $archivo = fopen("Ventas.txt", "a");
    for($i = 0; $i < count($arrayVentas); $i++){
      
    }
  } 

}
?>