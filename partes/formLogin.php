<?php
//session_start();

?>
<link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
<link href="css/ingreso.css" rel="stylesheet">

 
<?php
if(!isset($_SESSION['usuario'])){

?>
    <div id="formLogin">
      <a onclick="loginWithParameters('Admin','admin@admin.com',1234)" class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Administrador</a>
      <a onclick="loginWithParameters('User','user@user.com',5678)" class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>User</a>
      <a onclick="loginWithParameters('Guest','guest@guest.com',1111)" class='btn btn-warning'> <span class='glyphicon glyphicon-pencil'>&nbsp;</span>Guest</a>
      <BR> 
      <BR> 
      <form  class="form-ingreso " onsubmit="validarLogin();return false;">
        <h2 class="form-ingreso-heading">Ingrese sus datos</h2>
        <label for="nombre" class="sr-only">Nombre</label>
        <input type="text" id="nombre" class="form-control" placeholder="Nombre" required="" autofocus="" value="<?php  if(isset($_COOKIE["registroNombre"])){echo $_COOKIE["registroNombre"];}?>">
        <label for="correo" class="sr-only">Correo electrónico</label>
        <input type="email" id="correo" class="form-control" placeholder="Correo electrónico" required="" autofocus="" value="<?php  if(isset($_COOKIE["registroMail"])){echo $_COOKIE["registroMail"];}?>">
        <label for="clave" class="sr-only">Clave</label>
        <input type="password" id="clave" minlength="4" maxlength="4" class="form-control" placeholder="Clave" required="">
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox" id="recordarme"> Recordame
          </label>
          
        </div> -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>
        <!--<button class="btn btn-lg btn-primary btn-block" type="submit">Desloguear</button>-->
      <p></p>
      <p></p>
      </form>

    </div> <!-- /container -->

<?php

    } else {
?>
      <button class="btn btn-lg btn-danger btn-block" onclick="deslogear();">Desloguearse</button>

<?php
    }
?>

 
    
  
