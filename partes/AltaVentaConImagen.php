<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
<link href="css/ingreso.css" rel="stylesheet">

    <div>

      <form class="form-ingreso" onsubmit="return false">
        <h2 class="form-ingreso-heading">Alta venta con imagen</h2>
        <label for="mail" class="sr-only">Mail</label>
        <input type="mail" name="mail" id="mail" title="Ingrese un mail" class="form-control" placeholder="Ingrese un mail" required="" autofocus="">
       
        <label for="sabor" class="sr-only">Sabor</label>
        <input type="text" name="sabor" id="sabor" title="Ingrese un sabor" class="form-control" placeholder="Ingrese un sabor" required="" autofocus="">
                  
       <select class="form-control" id="tipo" name="tipo">
         <option value="Crema">Crema</option>
         <option value="Agua">Agua</option>
       </select>
       <label for="peso" class="sr-only">Peso (Kg.)</label>
        <input type="number"  maxlength="3"  id="peso" title="Ingrese peso (kg.)" class="form-control" placeholder="Ingrese el peso (kg.)" required="" autofocus="">
        <input readonly   type="hidden"    id="idProducto" class="form-control" >
       
        <button  class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>Consultar</button>
     
      </form>

    </div> <!-- /container -->


    
  
