<?php include('valida_acceso.php')?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="js/jquery-latest.min.js" type="text/javascript"></script>
</head>
<body>
<?php 
	include('menu.php');
?>
	<form id="frmdatos" method="post" action="accform/accEnviarMail.php">
		<table style="width:400px;">
			<tr>
				<td colspan="3" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Contacto</td>
			</tr>
			<tr>
				<td width="100">Nombre</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtnombre" id="txtnombre" value="" /></td>
			</tr>
			<tr>
				<td width="100">Asunto</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtasunto" id="txtasunto" value="" /></td>
			</tr>
			<tr>
				<td width="100">Correo</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtcorreo" id="txtcorreo" value="" /></td>
			</tr>
			<tr>
				<td width="100">Descripci&oacute;n</td>
				<td width="10" align="center">:</td>
				<td width="290"><textarea name="txtdescripcion" id="txtclave" rows="5" cols="50"></textarea></td>
			</tr>
			<tr>
				<td colspan="3" height="40" valign="bottom" align="center">
					<input type="submit" id="btnenviar" value="Enviar" />
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<div id="divmensaje"></div>
				</td>
			</tr>
		</table>
	</form>
	
	
</body>
</html>
   