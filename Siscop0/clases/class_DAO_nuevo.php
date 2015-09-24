<?php 
require ("class_Conexion.php");
// encapsula las operaciones contra la tabla usuario
class DAO_nuevo {
	//atributos
	private $nuevo;

	public function __construct(){
	// establece la conexion con el SMBD
	$this->nuevo=new Conexion();
	}
	//validar: verifica si el login y password dados por parametros se encuentran en la BD
	//			devuelve el registro de usuario si existe
	//			devuelve false si no existe
	public function crear ($nombre,$apellido,$login,$password,$email,$privilegio){
		$pass=md5($password);
		$sql = "INSERT INTO usuarios (nombre, apellido, login, password, email, privilegio ) VALUES ('$nombre','$apellido','$login','$pass','$email','$privilegio')";
		$res = $this->nuevo->ejecutar($sql);
		return $res;
		}
}
?>