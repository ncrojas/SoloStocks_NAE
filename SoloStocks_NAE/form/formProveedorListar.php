<?php
$oProveedor=new Proveedor();
?>
<form name="frmdatos" method="post" action="proveedor_upd.php">
<input type="hidden" name="hidcodigo" id="hidcodigo" value="" />
	<table style="width:700px;">
		<tr>
			<td colspan="5" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Proveedores</td>
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
				<td align="center"><a href="#" onclick="<?="javascript:editar(".$Registro->getIdProveedor().");";?>">Editar</a></td>
				<td><?=$Registro->getIdProveedor()?></td>
				<td><?=$Registro->getNombre()?></td>
				<td><?=$Registro->getDireccion()?></td>
				<td><?=$Registro->getPais()?></td>
			</tr>
<?php	}?>
	</table>
</form>