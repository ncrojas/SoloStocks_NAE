<?php include('valida_acceso.php')

?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="js/jquery-latest.min.js" type="text/javascript"></script>
   <title>Agregar Producto</title>
</head>
<body>
<?php
include('menu.php');
?>
AGREGAR
</body>
</html>

<form id="form1" name="form1" method="post" action="guardar.php">
  <table width="400" border="1">
    <tr>
      <td>codigo</td>
      <td><label for="sCodigo"></label>
      <input type="text" name="sCodigo" id="sCodigo" /></td>
    </tr>
    <tr>
      <td>cantidad</td>
      <td><label for="sCantidad"></label>
      <input type="text" name="sCantidad" id="sCantidad" /></td>
    </tr>
    <tr>
      <td>precio</td>
      <td><label for="sPrecio"></label>
      <input type="text" name="sPrecio" id="sPrecio" /></td>
    </tr>
    <tr>
      <td>descripcion</td>
      <td><label for="sDescripcion"></label>
      <input type="text" name="sDescripcion" id="sDescripcion" /></td>
    </tr>
  </table>
</form>
