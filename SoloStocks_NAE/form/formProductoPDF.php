<?php
include('../valida_acceso.php');
$oProducto=new Producto();

$content = "<page>
    <h1>Proveedores</h1>
    <br />
    <table>
		<tr style='background-color:#d8d8b1;'>
			<td>C&oacute;digo</td>
			<td>Descripci&oacute;n</td>
			<td>Cantidad</td>
			<td>Precio</td>
		</tr>";

While($Registro=$oProducto->Selecciona()){
	
	$content.= "<tr>";
	$content.= "<td>".$Registro->getCodigo()."</td>";
	$content.= "<td>".$Registro->getDescripcion()."</td>";
	$content.= "<td>".$Registro->getCantidad()."</td>";
	$content.= "<td>".$Registro->getPrecio()."</td>";
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
$html2pdf->Output('Productos.pdf','D');
?>
