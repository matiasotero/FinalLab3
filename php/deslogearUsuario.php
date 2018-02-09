<?php 
session_start();

	$_SESSION['usuario']=null;//Para destruir una variable global pongo un null

session_destroy();//Destruye el array

 ?>