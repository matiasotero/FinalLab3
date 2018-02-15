<?php
	require_once('clases/Venta.php');
	//$ventas = Venta::TraerTodasLasVentasTxt();
?>
<input type="hidden" id="data"/>
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
			<th>Editar</th>
			<th>Borrar</th>
			<th>Mail</th>
			<th>Sabor</th>
			<th>Tipo</th>
			<th>Peso</th>
			<th>Foto</th>
		</tr>
	</thead>
	<tbody>

		<?php
		if(isset($ventas)){ 
			foreach($ventas as $itemVenta){
			echo
			"<tr>
				<td><a onclick='EditarProducto($itemVenta->id)' class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Editar</a></td>
				<td><a onclick='BorrarProducto($itemVenta->id)' class='btn btn-danger'>   <span class='glyphicon glyphicon-trash'>&nbsp;</span>  Borrar</a></td>
				<td>$itemVenta->mail</td>	
				<td>$itemVenta->sabor</td>	
				<td>$itemVenta->tipo</td>	
				<td>$itemVenta->peso</td>";
		?>
		<?php
				if(isset($itemVenta->pathFoto)){
				echo		
					"<td><img src='ImagenesDeLaVenta/$itemVenta->pathFoto' style='width:50px;height:50px'/></td>
					
					</tr>";
				}
				else{
					echo "<td>Sin Imagen</td>";
				}
			}
		}
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