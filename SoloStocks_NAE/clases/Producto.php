<?php

class Producto{
	private $sCodigo;
	private $sCantidad;
	private $sPrecio;
	private $sDescripcion;

	function __construct($cod,$can,$pre,$des){
		$this->sCodigo=$cod;
		$this->sCantidad=$can;
		$this->sPrecio=$pre;
		$this->sDescripcion=$des;
	}


	function getCodigo(){
		return $this->sCodigo;
	}
	function getCantidad(){
		return $this->sCantidad;
	}
	function getPrecio(){
		return $this->sPrecio;
	}
	function getDescripcion(){
		return $this->sDescripcion;
	}

	function Elimina($id){
	
		$db=dbconnect();
	
		/*Definición del query que permitira eliminar un registro*/
		$sqldel="delete from producto where idacceso=:id";
	
		/*Preparación SQL*/
		$querydel=$db->prepare($sqldel);
			
		$querydel->bindParam(':id',$id);
			
		$valaux=$querydel->execute();
	
		return $valaux;
	}

}
?>