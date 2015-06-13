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
	
	function Selecciona(){
	
		if (!$this->querysel){
			$db=dbconnect();
			/*Definición del query que permitira ingresar un nuevo registro*/
	
			$sqlsel="select idacceso,nombre from usuario";
	
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
	
			$this->querysel->execute();
		}
	
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['idacceso'], $registro['nombre']);
		}
		else {
			return false;
				
		}
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

}
?>