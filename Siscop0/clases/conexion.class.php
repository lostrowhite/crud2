<?php 
class DB{
	var $conect;
  
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	function DB(){
		$this->BaseDatos = "exten";
		$this->Servidor = "localhost:90";
		$this->Usuario = "root";
		$this->Clave = "";
	}

	 function conectar() {
		 	
	$conn = mysql_connect($this->Servidor,$this->Usuario,$this->Clave);
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db($this->BaseDatos,$conn);
	if (!$conn) {
	echo "No pudo conectarse a la BD: " . mysql_error();
	exit;
	}
	return $conn;

		if(!($con=@mysql_connect($this->Servidor,$this->Usuario,$this->Clave))){
			echo"<h1> [:(] Error al conectar a la base de datos</h1>";	
			exit();
		}
		if (!@mysql_select_db($this->BaseDatos,$con)){
			echo "<h1> [:(] Error al seleccionar la base de datos</h1>";  
			exit();
		}
		$this->conect=$con;
		return true;	
	}
}

?>
