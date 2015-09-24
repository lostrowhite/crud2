<?php 
require ("class_Conexion.php");
// encapsula las operaciones contra la tabla usuario
class DAO_usuario {
	//atributos
	private $conexion;

	public function __construct(){
	// establece la conexion con el SMBD
	$this->conexion=new Conexion();
			mysql_query("SET NAMES 'utf8'");
	}
	//validar: verifica si el login y password dados por parametros se encuentran en la BD
	//			devuelve el registro de usuario si existe
	//			devuelve false si no existe
	public function validar ($login,$pass){
		$pass=md5($pass);
		$sql = "SELECT * FROM usuarios where login='$login' AND password ='$pass'";
		$res = $this->conexion->ejecutar($sql);
		$registro = $this->conexion->getRegistro($res);
		return $registro;
		
		}
		
	public function auditoria ($fecha,$ip,$login,$ev,$detalle){
		
	$sql= "INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login', 							    '$ev','$detalle')";
		$res = $this->conexion->ejecutar($sql);
		return $res;
		
		}
	
		
}
?>