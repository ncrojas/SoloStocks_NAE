<?php include('valida_acceso.php')?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="js/jquery-latest.min.js" type="text/javascript"></script>
   <script type="text/javascript">
   function editar(cod){
	   document.getElementById('hidcodigo').value = cod;
	   document.forms.frmdatos.submit();
   }
   </script>
   <title>Proveedores</title>
</head>
<body>
<?php 
	include('menu.php');	
	include('/form/formProveedorListar.php');
?>
</body>
</html>