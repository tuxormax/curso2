/*SUBIR LA FOTO DEL USUARIO*/
$(".foto").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".foto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "Entendido"
		    });

  	}else if(imagen["size"] > 2000){

  		$(".foto").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "Entendido"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);

  		})

  	}
})



/*editar USUARIO*/
$(".btneditar").click(function()
{
	var id = $(this).attr("id");
	//console.log("iduser",id);
	var datos = new FormData();
	datos.append("id",id);
	$.ajax(
	{
		url: "ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType:false,
		processData:false,
		dataType:"json",
		success: function(respuesta)
		{
			//console.log("respuesta=",respuesta);
			$("#id").val(respuesta["id"]);
			$("#editarnombre").val(respuesta["nombre"]);
			$("#editarusuario").val(respuesta["usuario"]);
			$("#editarclave").val("");
			$("#pass").val(respuesta["clave"]);	
		}
	});
})

/*EXISTE USUARIO*/
$("#usuario").change(function(){
	var usuario = $(this).val();
	var datos = new FormData();
	datos.append("validarusuario", usuario);
	$.ajax({
		url:"ajax.usuario.ajax.php",
		method:"POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success:function(respuesta){
			console.log("respuesta", respuesta);
		}
	})//ajax
})//existeusuario