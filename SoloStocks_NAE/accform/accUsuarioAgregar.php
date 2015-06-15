<?php
include ("../constantes.php");
include (PATHAPP.'/clases/clsUsuario.php');

$objUsuario = new Usuario(
		$_POST["txtnombres"]
		, $_POST["txtusuario"]
		, md5($_POST["txtclave"]));

$objUsuario->Agregar();

echo "Registro Agregado <br/>";
echo "<br/>Usuario: ".$_POST["txtusuario"];
echo "<br/>Nombre: ".$_POST["txtnombres"];

echo "<br /><a href='usuario_ls.php'>Aceptar</a>";
?>