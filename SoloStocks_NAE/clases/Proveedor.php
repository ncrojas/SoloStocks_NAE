<?php

class Proveedor{
	
	/* ****************************** */
	/*     P R O P I E D A D E S      */
	/* ****************************** */
	
	private $nIdProveedor;
	private $sNombre;
	private $sDescripcion;
	private $sDireccion;
	private $sPais;
	
	
	/* ****************************** */
	/*     C O N S T R U C T O R      */
	/* ****************************** */
	
	function __construct($nidp=NULL, $snom=NULL, $sdes=NULL, $sdir=NULL, $spai=NULL){
		$this->nIdProveedor = $nidp;
		$this->sNombre = $snom;
		$this->sDescripcion = $sdes;
		$this->sDireccion = $sdir;
		$this->sPais = $spai;
	}
	
	
	/* ****************************************************** */
	/*     A C C E S A D O R ES    Y   M U T A D O R E S      */
	/* ****************************************************** */
	
	function getIdProveedor(){
		return $this->nIdProveedor;
	}
	
	function setIdProveedor($nidp){
		$this->nIdProveedor = $nidp;
	}
	
	function getNombre(){
		return $this->sNombre;
	}
	
	function setNombre($snom){
		$this->sNombre = $snom;
	}
	
	function getDescripcion(){
		return $this->sDescripcion;
	}
	
	function setDescripcion($sdes){
		$this->sDescripcion = $sdes;
	}
	
	function getDireccion(){
		return $this->sDireccion;
	}
	
	function setDireccion($sdir){
		$this->sDireccion = $sdir;
	}
	
	function getPais(){
		return $this->sPais;
	}
	
	function setPais($spai){
		$this->sPais = $spai;
	}
	
	/* ****************************** */
	/*       F U N C I O N E S        */
	/* ****************************** */
	
	function Elimina($id){
	
		$db=dbconnect();
	
		/*Definición del query que permitira eliminar un registro*/
		$sqldel="DELETE FROM proveedor WHERE idproveedor=:id";
	
		/*Preparación SQL*/
		$querydel=$db->prepare($sqldel);
			
		$querydel->bindParam(':id',$id);
		
		$valaux=$querydel->execute();
	
		return $valaux;
	}
	
	
	function Agregar(){
		$db=dbconnect();
		$sqlins = " INSERT INTO proveedor (nombre, descripcion, direccion, pais) ";
		$sqlins.= " VALUES (:nom, :des, :dir, :pai) ";
		
		/*Preparacion SQL*/
		try {
			$queryins=$db->prepare($sqlins);
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryins->bindParam(':nom',$this->sNombre);
		$queryins->bindParam(':des',$this->sDescripcion);
		$queryins->bindParam(':dir',$this->sDireccion);
		$queryins->bindParam(':pai',$this->sPais);
	
		try {
			$queryins->execute();
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	}
	
	
	function Actualizar(){
		$db=dbconnect();
		$sqlupd = " UPDATE proveedor SET nombre=:nom, descripcion=:des, direccion=:dir, pais=:pai ";
		$sqlupd.= " WHERE idproveedor=:id ";
		
		/*Preparacion SQL*/
		try {
			$queryupd=$db->prepare($sqlupd);
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryupd->bindParam(':nom',$this->sNombre);
		$queryupd->bindParam(':des',$this->sDescripcion);
		$queryupd->bindParam(':dir',$this->sDireccion);
		$queryupd->bindParam(':pai',$this->sPais);
		$queryupd->bindParam(':id',$this->nIdProveedor);
		
		try {
			$queryupd->execute();
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	}
	
	
	function Selecciona(){
	
		if (!$this->querysel){
			$db=dbconnect();
			/*Definición del query que permitira ingresar un nuevo registro*/
	
			$sqlsel = " SELECT idproveedor, nombre, descripcion, direccion, pais ";
			$sqlsel.= " FROM proveedor ORDER BY nombre ";
				
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
				
			$this->querysel->execute();
		}
	
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['idproveedor'], $registro['nombre'], $registro['descripcion'], $registro['direccion'], $registro['pais']);
		}
		else {
			return false;
		}
	}
	
	function LeerRegistro(){
		if (!$this->querysel){
			$db=dbconnect();
			/*Definición del query que permitira ingresar un nuevo registro*/
			
			$sqlsel = " SELECT idproveedor, nombre, descripcion, direccion, pais ";
			$sqlsel.= " FROM proveedor WHERE idproveedor=:id ";
			
			/*Preparación SQL*/
			$querysel=$db->prepare($sqlsel);
			
			$querysel->bindParam(':id',$this->nIdProveedor);
			
			$querysel->execute();
		}
		
		$registro = $querysel->fetch();
		if ($registro){
			return new self($registro['idproveedor'], $registro['nombre'], $registro['descripcion'], $registro['direccion'], $registro['pais']);
		}
		else {
			return false;
		}
	}
}
?>
