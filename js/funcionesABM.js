function BorrarProducto(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarProducto",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla");
		$("#informe").html("cantidad de eliminados "+ retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}

function EditarProducto(idParametro)
{
	//Mostrar("MostrarFormAlta");
	//CODIGO DE MOSTRAR FORM ALTA
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostrarFormAlta"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");	

		//TRAER PRODUCTO Y MOSTRARLO
		var funcionAjax2=$.ajax({
			url:"nexo.php",
			type:"post",
			data:{
				queHacer:"TraerProducto",
				id:idParametro	
			}
		});
		funcionAjax2.done(function(retorno){
			var producto = JSON.parse(retorno);		
			$("#idProducto").val(producto.id);
			$("#nombre").val(producto.nombre);
			$("#porcentaje").val(producto.porcentaje);
			if(producto.fotoRuta != "" && producto.fotoRuta != "null" && producto.fotoRuta != null){
				//console.log(producto.fotoRuta);
				$("#frameFoto").html("<img src='tmp/"+producto.fotoRuta+"' style=\"max-height: 200px; max-width: 200px;\"/>" +
							"<input type='hidden' id='hdnArchivoTemp' value='"+producto.fotoRuta+"' />");
				$("#hdnArchivoTemp").val(producto.fotoRuta);
			}
		});
		funcionAjax2.fail(function(retorno){	
			$("#informe").html(retorno.responseText);	
		});	
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function EditarUsuario()
{
	//Mostrar("MostrarFormAlta");
	//CODIGO DE MOSTRAR FORM USUARIO
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostrarFormUsuario"}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");	

		var cookieId = getCookie("registroId");
		if(cookieId != ""){
			var cookieNombre = getCookie("registroNombre");
			var cookieMail = getCookie("registroMail");
			var cookieFoto = getCookie("registroFoto");
			$("#id").val(cookieId);
			$("#nombre").val(cookieNombre);
			$("#mail").val(cookieMail.replace("%40","@"));
			if(cookieFoto != "" && cookieFoto != "null" && cookieFoto != null){
				$("#frameFoto").html("<img src='tmp/"+cookieFoto+"' style=\"max-height: 200px; max-width: 200px;\"/>" + 
							"<input type='hidden' id='hdnArchivoTemp' value='"+cookieFoto+"' />");
				//$("#hdnArchivoTemp").val(cookieFoto);
			}
		}else{
			///CAPTURO EL ARRAY SESSION DE PHP
			var funcionAjax2=$.ajax({
			url:"nexo.php",
			type:"post",
			data:{
				queHacer:"TraerSession"
			}
			});
			funcionAjax2.done(function(retorno){
				//alert(retorno);
				var session = JSON.parse(retorno);
				//alert(session.id + " | " + session.usuario);
				///CON EL VALOR DEL SESSION BUSCO EL USUARIO
				var funcionAjax3=$.ajax({
					url:"nexo.php",
					type:"post",
					data:{
						queHacer:"TraerUsuario",
						id:session.id
					}
				});
				funcionAjax3.done(function(retorno){
					var usuario = JSON.parse(retorno);	
					$("#id").val(usuario.id);
					$("#nombre").val(usuario.nombre);
					$("#mail").val(usuario.mail);
					if(usuario.fotoRuta != "" && usuario.fotoRuta != "null" && usuario.fotoRuta != null){
						$("#frameFoto").html("<img src='tmp/"+usuario.fotoRuta+"' style=\"max-height: 200px; max-width: 200px;\"/>" + 
							"<input type='hidden' id='hdnArchivoTemp' value='"+usuario.fotoRuta+"' />");
						//$("#hdnArchivoTemp").val(usuario.fotoRuta);
					}
				});
				funcionAjax3.fail(function(retorno){	
					$("#informe").html(retorno.responseText);	
				});	
				///
			});
			funcionAjax2.fail(function(retorno){	
				$("#informe").html(retorno.responseText);	
			});	
			///
		}
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function GuardarProducto()
{
	var tipoDatos = $("#prodType").val();
	alert(tipoDatos);
	if(tipoDatos == "pdo"){

			var id=$("#idProducto").val();
			var sabor=$("#sabor").val();
			var precio = $("#precio").val();
			var tipo = $("#tipo option:selected").text();
			var peso =$("#peso").val();
			
			if(porcentaje < 1 || porcentaje > 100){
				alert("Porcentaje no valido (entre 1 y 100)");
				return;
			}

			var funcionAjax=$.ajax({
			url:"nexo.php",
			type:"post",
			data:{
				queHacer:"GuardarProductoTxt",
				id:id,
				sabor:sabor,
				precio:precio,
				tipo:tipo,
				peso:peso
			}
		});
		funcionAjax.done(function(retorno){
			$("#informe").html(retorno);	
			
		});
		funcionAjax.fail(function(retorno){	
			$("#informe").html(retorno.responseText);	
		});	
	}else if(tipoDatos == "txt"){
		alert("PRODUCTO POR TXT");

			var id=$("#idProducto").val();
			var nombre=$("#nombre").val();
			var porcentaje = $("#porcentaje").val();

			if(porcentaje < 1 || porcentaje > 100){
				alert("Porcentaje no valido (entre 1 y 100)");
				return;
			}
		var funcionAjax=$.ajax({
			url:"nexo.php",
			type:"post",
			data:{
				queHacer:"GuardarProductoTxt",
				id:id,
				nombre:nombre,
				porcentaje:porcentaje
			}
		});
		funcionAjax.done(function(retorno){
				//Mostrar("MostrarGrilla");
			$("#informe").html("cantidad de agregados \n"+ retorno + "\n" + retorno.responseText);	
			
		});
		funcionAjax.fail(function(retorno){	
			$("#informe").html(retorno.responseText);	
		});	
	}
}

function ConsultarHelado()
{
	var sabor=$("#sabor").val();
	var tipo = $("#tipo option:selected").text();
	//alert(idParametro);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"ConsultarHelado",
			sabor:sabor,
			tipo:tipo
		}
	});
	funcionAjax.done(function(retorno){		
		$("#informe").html("resultado:" + retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	

}

function GuardarUsuario()
{
		var id=$("#id").val();
		var nombre=$("#nombre").val();
		var mail=$("#mail").val();
		var contr=$("#contraseña").val();
		var newContr=$("#newContraseña").val();
		var fotoRuta = $("#hdnArchivoTemp").val();


		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarUsuario",
			id:id,
			nombre:nombre,
			mail:mail,
			contr:contr,
			newContr:newContr,
			fotoRuta:fotoRuta
		}
	});
	funcionAjax.done(function(retorno){
			//Mostrar("MostrarGrilla");
		$("#informe").html("Datos de Usuario Modificados Correctamente <br> " + retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#informe").html(retorno.responseText);	
	});	
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}

function GuardarVenta(){
	var venta = [];
	venta.email = $("#mail").val();
	venta.sabor = $("#sabor").val();
	venta.tipo = $("#tipo option:selected").val();
	venta.peso = $("#peso").val();

	var funcionAjax = $.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarVenta",
			venta: { "mail": venta.email, "sabor": venta.sabor, "tipo": venta.tipo, "peso": venta.peso }
		}
	});

	funcionAjax.done(function(response){
		$("#principal").html("");
		$("#informe").html(response);

	});

	funcionAjax.fail(function(error){
		$("#informe").html("Ocurrió un error: " + error);		
	});

	//console.log(venta);
}

function GuardarVentaConFoto(){
	// var formData = new FormData();
	// formData.append("mail", $('#mail').val());
	// formData.append("sabor", $('#sabor').val());
	// var tipo = $('#tipo option:selected').text();
	// formData.append("tipo", tipo);
	// formData.append("peso", $('#peso').val());
	var _venta = {};
	_venta.mail = $('#mail').val();
	_venta.sabor = $('#sabor').val();
	_venta.tipo = $('#tipo option:selected').text();
	_venta.peso = $('#peso').val();
	_venta.archivo = $('#hdnArchivoTemp').val();
	
	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type:'post',
		cache: false,
		async: true,
		data:{
			queHacer: 'GuardarVentaConFoto',
			venta: _venta
		}
	});

	funcionAjax.done(function(objJson){
		console.info(objJson);
		$('#informe').html(objJson);
	});

	console.info(_venta);
}

function SubirFoto(){
	var foto = $('#foto').val();

	if(foto === ""){
		return;
	}
	var test = $('#foto');
	//console.log(test);
	var archivo = $('#foto')[0];
	var formData = new FormData();
	formData.append("archivo", archivo.files[0]);
	formData.append("queHacer","subirFoto");
	//formData.append("fotoAnterior",);

	var funcionAjax = $.ajax({
		url: "nexo.php",
		type: "post",
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		data : formData,
		async : true
	});

	funcionAjax.done(function(objJson){			
		$('#frameFoto').html(objJson.Html);
		if(!objJson.Exito)
			alert(object.Mensaje);		
			return;
	});
}

function BuscarVentas(){
	var _valor = $('#search').val();

	var funcionAjax = $.ajax({
		url: 'nexo.php',
		type: 'post',
		cache: false,
		async: true,
		data: { queHacer: 'BuscarVentas', valor: _valor}
	});

	funcionAjax.done(function(success){
		console.log("Exito: " + success);
		$('#data').val(success);
		console.log($('#data').val());
	});

	funcionAjax.fail(function(errorCallBack){
		console.log("Error: " + errorCallBack);
	})
}