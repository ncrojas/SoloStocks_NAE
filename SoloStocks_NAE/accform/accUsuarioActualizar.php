<?php
$objUsuario = new Usuario(
		$_POST["hidid"]
		, $_POST["txtnombres"]
		, ""
		, "");

$objUsuario->Editar();

echo "Registro Modificado <br/>";
echo "<br/>Id:".$_POST["hidid"];
echo "<br/>Usuario: ".$_POST["hidusuario"];
echo "<br/>Nombre: ".$_POST["txtnombres"];

echo "<br /><a href='usuario_ls.php'>Aceptar</a>"
?>


