<html>
<head>
	<title><?php echo TITULOAPP;?></title>
	<script type="text/javascript" src="../js/jquery-1.11.2.min.js"></script>
</head>
<body>
<form action="accform/accUsuarioActualizar.php" id="frmdatos" method="post">
	<table width="400">
		<tr>
			<td colspan="3" height="30" valign="middle" align="center" style="color:#ffffff;background-color:navy;">Editar Usuario</td>
		</tr>
		<tr>
			<td width="100">Id</td>
			<td width="10" align="center">:</td>
			<td width="290"><input type="hidden" name="hidid" id="hidid" value="<?php echo $oUsuario->getId();?>" /><?php echo $oUsuario->getId();?></td>
		</tr>
		<tr>
			<td width="100">Usuario</td>
			<td width="10" align="center">:</td>
			<td width="290"><input type="hidden" name="hidusuario" id="hidusuario" value="<?php echo $oUsuario->getUsuario();?>" /><?php echo $oUsuario->getUsuario();?></td>
		</tr>
		<tr>
			<td width="100">Nombres</td>
			<td width="10" align="center">:</td>
			<td width="290"><input type="text" name="txtnombres" id="txtnombres" value="<?php echo $oUsuario->getNombres();?>" /></td>
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

<!-- <script type="text/javascript">

$(document).ready(function(){
	/*Llamada a PHP para procesar el formulario*/
	$("#btngrabar").click(function(){
		var svarform = $("#frmdatos").serialize();		
			/*Llamada a metodo JQUERY:AJAX para procesor el formulario*/
			$.ajax({
				  method: "POST",
				  url: "usuario_acc_ed.php",
				  data: svarform,
				  success: function(result){
					  $("#divmensaje").html(result);
		    		}
				});
			/*Detiene la ejecución del envio del formulario*/
			return false;
			});	
	});

</script>  -->

</body>
</html>