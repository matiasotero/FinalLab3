<?php
	require_once('clases/Venta.php');
	//$ventas = Venta::TraerTodasLasVentasTxt();
?>
<input type="hidden" id="data"/>
<div class="row">
    <div class="col-lg-5">
        <input type="search" id="search" placeholder="Ingrese email, sabor o nada" class="form-control"/>
    </div>
    <div class="col-lg-3">
        <button class="btn btn-primary" onclick="BuscarVentas()"><i class="glyphicon glyphicon-search" style="margin-right:10px"></i>Buscar</button>
    </div>
</div>
    <br/>
	<!-- <div id="table"> -->
	<table class="table" id="table"  style=" background-color: beige;">
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
		<tbody id="tbody">
		</tbody>
	</table>



<?php 

// }
// else{
// 	echo "<h1> NO ESTA LOGUEADO</h1>";
// }
// }
	 ?>