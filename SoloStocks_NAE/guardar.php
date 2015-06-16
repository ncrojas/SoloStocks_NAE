<?php


extract($_REQUEST);
include ('constante.php');
include (PATHAPP.'/lib/db_funciones.php');
include (PATHAPP.'/clases/Usuario.php');
mysql_query("insert into productos(Descripcion,Cantidad,Precio)values('$sDescripcion','$sCantidad','$sPrecio')");
?>