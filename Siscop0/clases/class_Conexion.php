<?php 
class Conexion {
	// atributos
	private $id; // identificador de la conexion
	
	// constructor: inicializa los atributos
	public function __construct() {
		$this->id = $this->abrir();	
	}
	// abrir: 	abre la conexion mediante mysql_connect
	// selecciona la BD
	private function abrir () {
		require ("/clases/configuser.php");
		// @ evita que se muestren advertencias
		$id = @mysql_connect (servidor,usuario,ctr);
		if (!$id) // no abrio la conexion
			throw new Exception ("Error en la conexión");
		// seleccionamos la BD
		if (!@mysql_select_db(bd,$id)) // error
			throw new Exception ("Error en la selección de la BD");
		return $id;
	}
	// ejecutar: 	ejecuta sentencias SQL dado el sql
	// por parametro
	public function ejecutar ($sql) {
		return @mysql_query($sql,$this->id);
	}
	// getRegistro: dado un Resulset devuelve el proximo
	// registro
	public function getRegistro ($res) {
		return @mysql_fetch_array($res);
	}
	// destruct: se le invoca al destruir el objeto
	// cerrar la conexion
	public function __destruct () {
		mysql_close($this->id);
	}
}
?>