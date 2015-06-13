<?php
include("../librerias.php");
$oUsr=new Usuario();
foreach ($_POST as $id){
	$oPro->Elimina($id);	
};
?>

<script>
	document.location.href="http://localhost/SoloStocks_NAE/usuario_del.php";
</script>