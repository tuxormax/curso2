<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/clientes.controlador.php";
require_once "controladores/compras.controlador.php";
require_once "controladores/impuestos.controlador.php";
require_once "controladores/insumos.controlador.php";
require_once "controladores/medicos.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/vendedores.controlador.php";
require_once "controladores/ventas.controlador.php";

require_once "modelos/clientes.modelo.php";
require_once "modelos/compras.modelo.php";
require_once "modelos/impuestos.modelo.php";
require_once "modelos/insumos.modelo.php";
require_once "modelos/medicos.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/vendedores.modelo.php";
require_once "modelos/ventas.modelo.php";



$plantilla = new Controladorplantilla();
$plantilla -> plantilla();