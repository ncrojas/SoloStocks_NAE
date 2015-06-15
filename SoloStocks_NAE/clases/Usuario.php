<?php 

class Usuario{
	private $snombre;
	private $susuario;
	private $sclave;
	private $querysel;
	private $querydel;
	
	function __construct($snom=NULL,$susr=NULL,$sclave=NULL){
		$this->snombre=$snom;
		$this->susuario=$susr;
		$this->sclave=md5($sclave);
	}
	
	
	public function getNombre(){
		return $this->snombre;
	}
	
	public function getUsuario(){
		return $this->susuario;
	}

	function VerificaUsuario(){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nombre from usuario
		where nomusuario=:usr";

		/*Preparaci�n SQL*/
		$querysel=$db->prepare($sqlsel);

		/*Asignaci�n de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->susuario);
		
		$datos=$querysel->execute();
		
		if ($querysel->rowcount()==1)return true; else return false;

	}
	
	
	

	function VerificaAcceso(){
		$db=dbconnect();
		/*Definici�n del query que permitira ingresar un nuevo registro*/
		$sqlsel="select nombre from usuario
		where nomusuario=:usr and pwdusuario=:pwd";

		/*Preparaci�n SQL*/
		$querysel=$db->prepare($sqlsel);

		/*Asignaci�n de parametros utilizando bindparam*/
		$querysel->bindParam(':usr',$this->susuario);
		$querysel->bindParam(':pwd',$this->sclave);

		$datos=$querysel->execute();

		if ($querysel->rowcount()==1){
			$this->snombre=$querysel->fetchColumn();
			return true;
		}
		else{
			return false;
		}		

	}
	
function Selecciona(){
		
		if (!$this->querysel){
		$db=dbconnect();
		/*Definición del query que permitira ingresar un nuevo registro*/
		
			$sqlsel="select idacceso, nombre, nomusuario from usuario";
		
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
		
			$this->querysel->execute();
		}
		
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['idacceso'], $registro['nombre'], $registro['nomusuario']);
		}
		else {
			return false;
			
		}
	}
	
	function Elimina($id){
	
		$db=dbconnect();
	
		/*Definición del query que permitira eliminar un registro*/
		$sqldel="delete from usuario where idacceso=:id";
	
		/*Preparación SQL*/
		$querydel=$db->prepare($sqldel);
			
		$querydel->bindParam(':id',$id);
			
		$valaux=$querydel->execute();
	
		return $valaux;
	}
	
	function Agregar(){
		$db=dbconnect();
		$sqlins="insert into usuario (nombre,nomusuario,pwdusuario) values (:nom,:usr,:pwd)";
	
		// Valida si usuario existe, si existe no lo agrega.
		if ($this->VerificaUsuario()){
			echo "Clase Usuario:Agregar: El usuario $this->sUsuario existe en la base de datos.";
			return false;
		}
	
		/*Preparacion SQL*/
			try {
		$queryins=$db->prepare($sqlins);
		}
		catch( PDOException $Exception ) {
		echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	
		/*Asignacion de parametros utilizando bindparam*/
		$queryins->bindParam(':nom',$this->sNombres);
		$queryins->bindParam(':usr',$this->sUsuario);
				$queryins->bindParam(':pwd',$this->sClave);
	
						try {
						$queryins->execute();
						}
						catch( PDOException $Exception ) {
						echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
						}
						}

}
?>