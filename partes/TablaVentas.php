<div class="row">
    <div class="col-lg-5">
        <input type="search" placeholder="Ingrese email, sabor o nada" class="form-control"/>
    </div>
    <div class="col-lg-3">
        <button class="btn btn-primary" id="search" onclick="BuscarVentas()"><i class="glyphicon glyphicon-search" style="margin-right:10px"></i>Buscar</button>
    </div>
</div>
    <br/>
<table class="table"  style=" background-color: beige;">
	<thead>
		<tr>
			<th>Editar</th><th>Borrar</th><th>Nombre</th><th>Porcentaje</th>
		</tr>
	</thead>
	<tbody>

		<?php 

// foreach ($arrayDeProductos as $producto) {
// 	echo"<tr>
// 			<td><a onclick='EditarProducto($producto->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
// 			<td><a onclick='BorrarProducto($producto->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>
// 			<td>$producto->nombre</td>	
// 			<td>$producto->porcentaje</td>	

// 		</tr>   ";
// }
		 ?>
	</tbody>
</table>

<?php 

// }
// else{
// 	echo "<h1> NO ESTA LOGUEADO</h1>";
// }
// }
	 ?>