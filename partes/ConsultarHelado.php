<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
<link href="css/ingreso.css" rel="stylesheet">

    <div>

      <form class="form-ingreso" onsubmit="ConsultarHelado();return false">
        <h2 class="form-ingreso-heading">Consultar Helado</h2>
        
        
        <label for="sabor" class="sr-only">Sabor</label>
        <input type="text" name="sabor" id="sabor" title="Ingrese un sabor" class="form-control" placeholder="Ingrese un sabor" required="" autofocus="">
                  
       <select class="form-control" id="tipo" name="tipo">
         <option value="Crema">Crema</option>
         <option value="Agua">Agua</option>
       </select>
       <input readonly   type="hidden"    id="idProducto" class="form-control" >
       
        <button  class="btn btn-lg btn-success btn-block" type="submit"><span class="">&nbsp;&nbsp;</span>Realizar consulta</button>
     
      </form>

    </div> <!-- /container -->


    
  
