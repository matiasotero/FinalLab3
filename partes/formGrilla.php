<?php
//Primer regla de session es colocar esta linea de codigo
	//session_start();

	if(isset($_SESSION['usuario']))
	{
		require_once("clases/AccesoDatos.php");
		require_once("clases/producto.php");
		$arrayDeProductos=producto::TraerTodoLosProductos();
	
if($_SESSION['usuario'] == "Admin" ||$_SESSION['usuario'] == "User" ||$_SESSION['usuario'] == "Guest"  ){


?>
<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>Nombre</th><th>Porcentaje</th>
		</tr>
	</thead>
	<tbody>

		<?php 

foreach ($arrayDeProductos as $producto) {
	echo"<tr>
			<td><a onclick='EditarProducto($producto->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
			<td><a onclick='BorrarProducto($producto->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>
			<td>$producto->nombre</td>	
			<td>$producto->porcentaje</td>	

		</tr>   ";
}
		 ?>
	</tbody>
</table>

<?php 

}
else{
	echo "<h1> NO ESTA LOGUEADO</h1>";
}
}
	 ?>