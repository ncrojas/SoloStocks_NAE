<?php

class Producto{
	
	/* ****************************** */
	/*     P R O P I E D A D E S      */
	/* ****************************** */
	
	private $nCodigo;
	private $sDescripcion;
	private $sCantidad;
	private $sPrecio;

	
	
	/* ****************************** */
	/*     C O N S T R U C T O R      */
	/* ****************************** */
	
	function __construct($ncod=NULL, $sdes=NULL, $scan=NULL, $spre=NULL){
		$this->nCodigo = $ncod;
		$this->sDescripcion = $sdes;		
		$this->sCantidad = $scan;
		$this->sPrecio = $spre;



	}
	
	
	/* ****************************************************** */
	/*     A C C E S A D O R ES    Y   M U T A D O R E S      */
	/* ****************************************************** */
	
	function getCodigo(){
		return $this->nCodigo;
	}
	function setCodigo($ncod){
		$this->nCodigo = $ncod;
	}
	
	function getDescripcion(){
		return $this->sDescripcion;
	}
	function setDescripcion($sdes){
		$this->sDescripcion = $sdes;
	}	
	
	function getCantidad(){
		return $this->sCantidad;
	}
	function setCantidad($scan){
		$this->sCantidad = $scan;
	}
	
	function getPrecio(){
		return $this->sPrecio;
	}
	function setPrecio($spre){
		$this->sPrecio = $spre;
	}
	

	
	
	/* ****************************** */
	/*       F U N C I O N E S        */
	/* ****************************** */
	
	function Elimina($id){
	
		$db=dbconnect();
	
		/*Definición del query que permitira eliminar un registro*/
		$sqldel="DELETE FROM producto WHERE codigo=:id";
	
		/*Preparación SQL*/
		$querydel=$db->prepare($sqldel);
			
		$querydel->bindParam(':id',$id);
		
		$valaux=$querydel->execute();
	
		return $valaux;
	}
	
	
	function Agregar(){
		$db=dbconnect();
		$sqlins = " INSERT INTO producto (descripcion, cantidad, precio) ";
		$sqlins.= " VALUES (:des, :can, :pre ) ";
		
		/*Preparacion SQL*/
		try {
			$queryins=$db->prepare($sqlins);
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryins->bindParam(':des',$this->sDescripcion);
		$queryins->bindParam(':can',$this->sCantidad);
		$queryins->bindParam(':pre',$this->sPrecio);
	
		try {
			$queryins->execute();
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	}
	
	
	function Actualizar(){
		$db=dbconnect();
		$sqlupd = " UPDATE producto SET descripcion=:des, cantidad=:can, precio=:pre ";
		$sqlupd.= " WHERE codigo=:id ";
		
		/*Preparacion SQL*/
		try {
			$queryupd=$db->prepare($sqlupd);
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryupd->bindParam(':des',$this->sDescripcion);
		$queryupd->bindParam(':can',$this->sCantidad);
		$queryupd->bindParam(':pre',$this->sPrecio);
		$queryupd->bindParam(':id',$this->nCodigo);
		
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
	
			$sqlsel = " SELECT codigo, descripcion, cantidad, precio ";
			$sqlsel.= " FROM producto ORDER BY descripcion ";
				
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
				
			$this->querysel->execute();
		}
	
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['codigo'], $registro['descripcion'], $registro['cantidad'], $registro['precio']);
		}
		else {
			return false;
		}
	}
	
	function LeerRegistro(){
		if (!$this->querysel){
			$db=dbconnect();
			/*Definición del query que permitira ingresar un nuevo registro*/
			
			$sqlsel = " SELECT codigo, descripcion, cantidad, precio ";
			$sqlsel.= " FROM producto WHERE codigo=:id ";
			
			/*Preparación SQL*/
			$querysel=$db->prepare($sqlsel);
			
			$querysel->bindParam(':id',$this->nCodigo);
			
			$querysel->execute();
		}
		
		$registro = $querysel->fetch();
		if ($registro){
			return new self($registro['codigo'], $registro['descripcion'], $registro['cantidad'], $registro['precio']);
		}
		else {
			return false;
		}
	}
}
?>