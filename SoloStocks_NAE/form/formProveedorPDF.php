<?php
include('../valida_acceso.php');
$oProveedor=new Proveedor();

$content = "<page>
    <h1>Proveedores</h1>
    <br />
    <table>
		<tr style='background-color:#d8d8b1;'>
			<td>Id</td>
			<td>Nombre</td>
			<td>Direcci&oacute;n</td>
			<td>Pa&iacute;s</td>
		</tr>";

While($Registro=$oProveedor->Selecciona()){
	
	$content.= "<tr>";
	$content.= "<td>".$Registro->getIdProveedor()."</td>";
	$content.= "<td>".$Registro->getNombre()."</td>";
	$content.= "<td>".$Registro->getDireccion()."</td>";
	$content.= "<td>".$Registro->getPais()."</td>";
	$content.= "</tr>";
}

$content.= "</table></page>";

require_once(dirname(__FILE__).'/../modulo/html2pdf/html2pdf.class.php');
/*
 Constructor Clase HTML2PDF
 http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:accueil#initalizing_the_html2pdf_class
*/
$html2pdf = new HTML2PDF('P','LETTER','es');
$html2pdf->WriteHTML($content);
/*
 Opción de Salida: 'D', forzar descarga
 http://wiki.spipu.net/doku.php?id=html2pdf:es:v3:salida
*/
$html2pdf->Output('Proveedores.pdf','D');
?>
