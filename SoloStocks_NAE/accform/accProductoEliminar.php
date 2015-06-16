<?php
include("../librerias.php");
$oUsr=new Producto();
foreach ($_POST as $id){
	$oUsr->Elimina($id);	
};
?>

<script>
	document.location.href="http://localhost/SoloStocks_NAE/Producto_del.php";
</script>