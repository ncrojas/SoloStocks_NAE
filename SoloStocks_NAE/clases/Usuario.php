<?php 

class Usuario{
	private $sId;
	private $snombre;
	private $susuario;
	private $sclave;
	private $querysel;
	private $querydel;
	private $queryins;
	
	function __construct($snom=NULL,$susr=NULL,$sclave=NULL){
		$this->snombre=$snom;
		$this->susuario=$susr;
		$this->sclave=md5($sclave);
	}
	
	
	public function getNombre(){
		return $this->snombre;
	}
	
	public function getClave(){
		return $this->sclave;
	}
	
	public function getUsuario(){
		return $this->susuario;
	}
	
	function getId(){
		return $this->sId;
	}
	
	function setId($id){
		$this->sId=$id;
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
		
			$sqlsel="SELECT idacceso, nombre, nomusuario FROM usuario ORDER BY nombre";
		
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
				return false;
			}
	
		/*Asignacion de parametros utilizando bindparam*/
		$queryins->bindParam(':nom',$this->snombre);
		$queryins->bindParam(':usr',$this->susuario);
		$queryins->bindParam(':pwd',$this->sclave);
	
						try {
						$queryins->execute();
						}
						catch( PDOException $Exception ) {
						echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
						}
			}
			
			function Editar(){
				$db=dbconnect();
				$sqlupd="update usuario set nombre=:nom where id=:id";
			
				/*Preparacion SQL*/
				try {
					$queryupd=$db->prepare($sqlupd);
				}
				catch( PDOException $Exception ) {
					echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				}
			
				/*Asignacion de parametros utilizando bindparam*/
				$queryupd->bindParam(':nom',$this->snombre);
				$queryupd->bindParam(':id',$this->sId);
			
				try {
					$queryupd->execute();
				}
				catch( PDOException $Exception ) {
					echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				}
			}
			

			function BuscarPorID(){
				$querysel = "";
				$db=dbconnect();
			
				$sqlsel="select id, nombre, nomusuario, pwdusuario from usuario where id=:id";
			
				/*Preparación SQL*/
				$querysel=$db->prepare($sqlsel);
			
				/*Asignación de parametros utilizando bindparam*/
				$querysel->bindParam(':id',$this->sId);
			
				$datos=$querysel->execute();
			
				$registro = $querysel->fetch();
				if ($registro){
					return new self($registro['id'], $registro['nombre'], $registro['nomusuario']);
				} else {
					return false;
				}
			
			}
			
			function LeerRegistro(){
				if (!$this->querysel){
					$db=dbconnect();
					
						
					$sqlsel = " SELECT idacceso, nombre, nomusuario, pwdusuario ";
					$sqlsel.= " FROM usuario WHERE idacceso=:id ";
						
					/*Preparación SQL*/
					$querysel=$db->prepare($sqlsel);
						
					$querysel->bindParam(':id',$this->sId);
						
					$querysel->execute();
				}
			
				$registro = $querysel->fetch();
				if ($registro){
					return new self($registro['idacceso'], $registro['nombre'], $registro['nomusuario'], $registro['pwdusuario']);
				}
				else {
					return false;
				}
			}
			
			function Actualizar(){
				$db=dbconnect();
				$sqlupd = " UPDATE usuario SET nombre=:nom, nomusuario=:nus, pwdusuario=:pus ";
				$sqlupd.= " WHERE idacceso=:id ";
			
				/*Preparacion SQL*/
				try {
					$queryupd=$db->prepare($sqlupd);
				} catch( PDOException $Exception ) {
					echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				}
			
				/*Asignacion de parametros utilizando bindparam*/
				$queryupd->bindParam(':nom',$this->sNombre);
				$queryupd->bindParam(':nus',$this->susuario);
				$queryupd->bindParam(':pus',$this->sclave);
				$queryupd->bindParam(':id',$this->sId);
			
				try {
					$queryupd->execute();
				} catch( PDOException $Exception ) {
					echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
				}
			}

}
?>