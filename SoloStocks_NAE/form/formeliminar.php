<?php
$oUsuario=new Usuario();
?>
<form method="post" action="accform/accUsuarioEliminar.php">
<?php
While($Registro=$oUsuario->Selecciona()){

?>
<input type="checkbox" name=elimina<?=$Registro->getNombre()?> value="<?=$Registro->getNombre()?>">
<?=$Registro->getNombre()?>/<?=$Registro->getNombre()?>
<br>
<?php
}

?>
<input type="submit" value="Eliminar">
</form>