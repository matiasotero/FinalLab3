<?php
class Venta{
    public $mail;
    public $sabor;
    public $tipo;
    public $peso;

    function ToString(){
		return $this->mail."|".$this->sabor."|".$this->tipo."|".$this->peso."\n";
	}
}
?>