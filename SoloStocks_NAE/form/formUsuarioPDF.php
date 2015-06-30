<?php
include('../valida_acceso.php');
$oUsuario=new Usuario();

$content = "<page>
    <h1>Usuarios</h1>
    <br />
    <table>
		<tr style='background-color:#d8d8b1;'>
			<td>Id</td>
			<td>Nombre</td>
			<td>Usuario</td>
		</tr>";

While($Registro=$oUsuario->Selecciona()){
	
	$content.= "<tr>";
	$content.= "<td>".$Registro->getId()."</td>";
	$content.= "<td>".$Registro->getNombre()."</td>";
	$content.= "<td>".$Registro->getUsuario()."</td>";
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
$html2pdf->Output('Usuarios.pdf','D');
?>
