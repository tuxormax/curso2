<?php

class Controladorusuarios
{
	/*ingreso de usuario login*/
	static public function ingresousuario()
	{
		if(isset($_POST["usuario"]))
		{
			if(preg_match('/^[a-zA-Z0-9]+$/',$_POST["usuario"]) &&
			preg_match('/^[a-zA-Z0-9]+$/',$_POST["clave"]))
			{
				$tabla = "usuarios";
				$item = "usuario";
				$valor = $_POST["usuario"];
				$respuesta = Modelousuarios::mostrarusuarios($tabla,$item,$valor);
				$clavehash=hash("SHA256",$_POST["clave"]);
				if($respuesta["usuario"] == $_POST["usuario"] && $respuesta["clave"] == $clavehash)
				{
					echo '<br/><div class="alert alert-success" align="center">Bienvenido</div>';
					$_SESSION["iniciarsesion"] = "ok";
					$_SESSION["nombre"] = $respuesta["nombre"];
					//echo '<script> window.location = "inicio" </script>';
					echo '<script>
						swal(
							{
								type: "success",
								title: "Bienvenido",
								showConfirmButton: true,
								confirmButtonText: "Ir a Inicio",
								closeOnConfirm: false
							}).then((result)=>
							{
								if(result.value)
								{
									window.location = "inicio";
								}
							});
					</script>';
				}//if respuesta
				else
				{
					//echo '<br/><div class="alert alert-danger" align="center">ERROR AL INGRESAR<br/> El usuario/contraseña está incorrecto.</div>';
					echo '<script>
						swal(
							{
								type: "error",
								title: "Usuario o Clave incorrectos",
								showConfirmButton: true,
								confirmButtonText: "Entendido",
								closeOnConfirm: false
							}).then((result)=>
							{
								if(result.value)
								{
									window.location = "login";
								}
							});
					</script>';
				}//else respuesta
			}//pregmatch
		}//isset
	}//ingresousuario

	/*CREAR USUARIO*/
	static public function crearusuario()
	{
		if(isset($_POST["usuario"]))
		{
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nombre"]) &&
			preg_match('/^[a-zA-Z0-9ñÑ]+$/', $_POST["usuario"]) &&
			preg_match('/^[a-zA-Z0-9ñÑ]+$/', $_POST["usuario"]))
			{
				$tabla = "usuarios";
				$datos = array(
					"nombre" => $_POST["nombre"],
					"usuario" => $_POST["usuario"],
					"clave" => $_POST["clave"],
					"perfil" => $_POST["perfil"]);
				$respuesta = Modelousuarios::ingresarusuarios($tabla, $datos);
				if($respuesta == "ok")
				{
					echo '<script>
							swal(
								{
									type: "success",
									title: "El usuario ha sido guardado correctamente",
									showConfirmButton: true,
									confirmButtonText: "Cerrar",
									closeOnConfirm: false
								}).then((result)=>
								{
									if(result.value)
									{
										window.location = "usuarios";
									}
								});
						</script>';
				}
			}//pregmatch
			else
			{
				echo '<script>
						swal(
							{
								type: "error",
								title: "El usuario/clave no puede llevar caracteres especiales ni espacios",
								showConfirmButton: true,
								confirmButtonText: "Entendido",
								closeOnConfirm: false
							}).then((result)=>
							{
								if(result.value)
								{
									window.location = "usuarios";
								}
							});
					</script>';
			}
		}//isset
	}//crearusuario

	/*LISTAR USUARIOS*/
	static public function mostrarusuarios($item, $valor)
	{
		$tabla = "usuarios";
		$respuesta = Modelousuarios::mostrarusuarios($tabla, $item, $valor);
		return $respuesta;
	}
}//class