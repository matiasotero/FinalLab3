
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/ingreso.css" rel="stylesheet">

    <div>

      <form class="form-ingreso" onsubmit="GuardarUsuario();return false">
        <h2 class="form-ingreso-heading">Perfil del Usuario</h2>
        <label for="nombre" class="sr-only">Foto de Perfil</label>
        <div id="frameFoto">

        </div>
        <input type="file" name="archivo" id="archivo" onchange="SubirFoto()" /> 
        <label for="nombre" class="sr-only">Nombre</label>
        <input type="text"  id="nombre" title="Nombre de Usuario" class="form-control" placeholder="Nombre" required="" autofocus="">
        <label for="mail" class="sr-only">Mail</label>
        <input type="text"  minlength="6"  id="mail" title="E-mail" class="form-control" placeholder="E-mail" required="" autofocus="">
        <label for="contraseña" class="sr-only">Contraseña</label>
        <input type="text"  id="contraseña" title="Contraseña" class="form-control" placeholder="Contraseña Actual"  autofocus="">
        <label for="newContraseña" class="sr-only">Nueva Contraseña</label>
        <input type="text"  id="newContraseña" title="Nueva Contraseña" class="form-control" placeholder="Contraseña Nueva"  autofocus="">
       <input readonly   type="hidden"    id="id" class="form-control" >
       

       <button  class="btn btn-lg btn-success btn-block" type="submit"><span class="glyphicon glyphicon-floppy-save">&nbsp;&nbsp;</span>Guardar </button>
      </form>

      <button class="btn btn-lg btn-danger btn-block" onclick="BorrarCookies();">Eliminar Cookies</button>

    </div> <!-- /container -->


    
  
