<?php
$oProveedor=new Proveedor();
?>
<form method="post" action="accform/accProveedorEliminar.php">
	<table style="width:700px;">
		<tr>
			<td colspan="5" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Eliminar Proveedor(es)</td>
		</tr>
		<tr style="background-color:#d8d8b1;">
			<td>&nbsp;</td>
			<td>Id</td>
			<td>Nombre</td>
			<td>Direcci&oacute;n</td>
			<td>Pa&iacute;s</td>
		</tr>
<?php
	While($Registro=$oProveedor->Selecciona()){?>
		<tr>
			<td>
				<input type="checkbox" name="elimina<?=$Registro->getIdProveedor()?>" value="<?=$Registro->getIdProveedor()?>">
			</td>
			<td><?=$Registro->getIdProveedor()?></td>
			<td><?=$Registro->getNombre()?></td>
			<td><?=$Registro->getDireccion()?></td>
			<td><?=$Registro->getPais()?></td>
		</tr>
<?php
	}
?>
		<tr>
			<td colspan="5" height="40" valign="bottom" align="center">
				<input type="submit" id="btneliminar" value="Eliminar" />
			</td>
		</tr>
	</table>
</form>