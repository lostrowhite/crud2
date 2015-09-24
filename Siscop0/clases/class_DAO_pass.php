<?php 
require ("class_Conexion.php");
// encapsula las operaciones contra la tabla usuario
class DAO_pass {
	//atributos
	private $conexion;

	public function __construct(){
	// establece la conexion con el SMBD
	$this->pass=new Conexion();
	}
	//validar: verifica si el login y password dados por parametros se encuentran en la BD
	//			devuelve el registro de usuario si existe
	//			devuelve false si no existe
	public function pass($clave,$login){
		$clave = md5($clave);
		$sql = "UPDATE usuario SET password='$clave' WHERE login ='$login'";
		$res = $this->pass->ejecutar($sql);
		$registro = $this->pass->getRegistro($res);
		return $registro;
		}
}
?>