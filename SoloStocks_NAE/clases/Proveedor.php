<?php

class Producto{
	private $sIdProveedor;
	private $sNombre;
	private $sDireccion;

	function __construct($idp,$nom,$dir){
		$this->sIdProveedor=$cod;
		$this->sNombre=$nom;
		$this->sDireccion=$dir;

	}


	function getIdProveedor(){
		return $this->sIdProveedor;
	}
	function getNombre(){
		return $this->sNombre;
	}
	function getDireccion(){
		return $this->sDireccion;
	}



}
?>
