<?php 
	include('valida_acceso.php');
	//include('clases/Proveedor.php');
	
// Lee datos del registro a editar
$oProveedor = new Proveedor();

if (isset($_POST["hidcodigo"])){
	$oProveedor->setIdProveedor($_POST["hidcodigo"]);
	$Registro = $oProveedor->LeerRegistro();
} else {
	echo "C�digo no especificado.";
	exit();
}
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
   <title>Editar Proveedor</title>
</head>
<body>
<?php 
	include('menu.php');
?>
<div style="text-align: center;width:100%">
	<br/>
	<form id="frmdatos" method="post">
		<table style="width:400px;">
			<tr>
				<td colspan="3" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Editar Proveedor</td>
			</tr>
			<tr>
				<td width="100">Id</td>
				<td width="10" align="center">:</td>
				<td width="290"><?=$Registro->getIdProveedor();?><input type="hidden" name="hidid" id="hidid" value="<?=$Registro->getIdProveedor();?>" /></td>
			</tr>
			<tr>
				<td width="100">Nombre</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtnombre" id="txtnombre" value="<?=$Registro->getNombre();?>" /></td>
			</tr>
			<tr>
				<td width="100">Descripci&oacute;n</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtdescripcion" id="txtdescripcion" value="<?=$Registro->getDescripcion();?>" /></td>
			</tr>
			<tr>
				<td width="100">Direcci&oacute;n</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtdireccion" id="txtdireccion" value="<?=$Registro->getDireccion();?>" /></td>
			</tr>
			<tr>
				<td width="100">Pa&iacute;s</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtpais" id="txtpais" value="<?=$Registro->getPais();?>" /></td>
			</tr>
			<tr>
				<td colspan="3" height="40" valign="bottom" align="center">
					<input type="submit" id="btngrabar" value="Guardar" />
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<div id="divmensaje"></div>
				</td>
			</tr>
		</table>
	</form>
</div>

<script type="text/javascript">

$(document).ready(function(){
	/*Llamada a PHP para procesar el formulario*/
	$("#btngrabar").click(function(){
		var svarform = $("#frmdatos").serialize();		
			/*Llamada a metodo JQUERY:AJAX para procesor el formulario*/
			$.ajax({
				  method: "POST",
				  url: "accform/accProveedorActualizar.php",
				  data: svarform,
				  success: function(result){
					  $("#divmensaje").html(result);
					  $("#txtnombre").value = '';
					  $("#txtdescripcion").value = '';
					  $("#txtdireccion").value = '';
					  $("#txtpais").value = '';
		    		}
				});
			/*Detiene la ejecuci�n del envio del formulario*/
			return false;
			});	
	});

</script>

</body>
</html>