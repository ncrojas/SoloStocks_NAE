<?php

class Producto{
	private $sCodigo;
	private $sCantidad;
	private $sPrecio;
	private $sDescricion;

	function __construct($cod,$can,$pre,$des){
		$this->sCodigo=$cod;
		$this->sCantidad=$can;
		$this->sPrecio=$pre;
		$this->sDescricion=$des;
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



}
?>