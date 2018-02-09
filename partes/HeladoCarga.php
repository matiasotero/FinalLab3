<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
<link href="css/ingreso.css" rel="stylesheet">

    <div>

      <form class="form-ingreso" onsubmit="GuardarProducto();return false">
        <h2 class="form-ingreso-heading">Detalles del helado</h2>

        <label for="sabor" class="sr-only">Sabor</label>
        <input type="text" name="sabor" id="sabor" title="Ingrese un sabor" class="form-control" placeholder="Ingrese un sabor" required="" autofocus="">
        <label for="sabor" class="sr-only">Precio</label>
        <input type="text"   name="precio" id="precio" title="Ingrese el precio" class="form-control" placeholder="Ingrese el precio" required="" autofocus="">                
       <select class="form-control" id="tipo" name="tipo">
         <option value="Crema">Crema</option>
         <option value="Agua">Agua</option>
       </select>
       <label for="peso" class="sr-only">Peso (Kg.)</label>
        <input type="number"  maxlength="3"  id="peso" title="Ingrese peso (kg.)" class="form-control" placeholder="Ingrese el peso (kg.)" required="" autofocus="">
        <input readonly   type="hidden"    id="idProducto" class="form-control" >
       
        <button  class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>Guardar </button>
     
      </form>

    </div> <!-- /container -->


    
  
