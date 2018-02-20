<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
<link href="css/ingreso.css" rel="stylesheet">

    <div>

      <form class="form-ingreso" onsubmit="EditarHelado();return false">
        <h2 class="form-ingreso-heading">Modificación del helado</h2>

        <label for="sabor" class="sr-only">Sabor</label>
        <input type="text" name="sabor" id="sabor" title="Ingrese un sabor" class="form-control" placeholder="Ingrese un sabor" required="" autofocus="">
                         
       <select class="form-control" id="tipo" name="tipo">
         <option value="Crema">Crema</option>
         <option value="Agua">Agua</option>
        </select>   
        <button  class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-search">&nbsp;&nbsp;</span>Traer Helado </button>
     
      </form>

    </div> <!-- /container -->


    
  
