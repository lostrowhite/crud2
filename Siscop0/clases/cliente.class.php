	<?php 
include_once("conexion.class.php");
class Cliente{
 //constructor	
 	var $con;
 	function Cliente(){
 		$this->con=new DB;
 	}
			function pagoavances(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM mpagosa");
	}
	}
		function insertar($campos){
		if($this->con->conectar()==true){
			//print_r($campos);
			//echo "INSERT INTO coordinador (nombre, direccion, telefono, correo) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."')";
			return mysql_query("INSERT INTO coordinador (nombre, direccion, telefono, correo ) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."')");
		}
	}
		function muestrasocio(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM socios WHERE estado='0' ORDER BY id_s ASC");
	}
	
		}
		
	function muestratprestamo(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM tprestamo");
	}
	}
	function montoprestamos(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM mprestamos");
	}
	}
	function mostrarprestamos(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM prestamos WHERE estado ='Pendiente'");
	}
	}
	function mostrarhprestamos(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM prestamos WHERE estado ='Pagado'");
	}
	}
	function mostrarprestamospe($buscar){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM prestamos WHERE estado ='Pendiente' AND cedula ='$buscar'");
	}
	}
	function mostrarprestamospa($buscar){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM prestamos WHERE estado ='Pagado' AND cedula ='$buscar'");
	}
	}
	function mostrarfinanzape($buscar){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM pagosocios WHERE id_s ='$buscar' ORDER BY mes ASC");
	}
	}
	function mostrarfinanzapa($buscar){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM pagosocios WHERE id_s ='$buscar'");
	}
	}
	function mostrarmultaspe($buscar){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM multas WHERE estado ='Pendiente' AND cedula ='$buscar'");
	}
	}
	function mostrarmultaspa($buscar){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM multas WHERE estado ='Pagado' AND cedula = '$buscar'");
	}
	}
	function mostrarhmultas(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM multas WHERE estado ='Pagado'");
	}
	}
		function mostrarservicios(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM servicios ");
	}
	}
	function muestrasocioinactivos(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM sinactivos ORDER BY nsocio ASC");
	}
	}
	function mostrar_nsocio(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM socios WHERE estado = '0' ORDER BY id_s ASC");
	}
	}
	
	function muestra_nsocio($id_s){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM socios WHERE id_s=".$id_s);
	}
	}
	function muestra_nsociof($id_s){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM socios WHERE estado = '0' and nsocio=".$id_s);
	}
	}
	function mpagoavances(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM mpagosa");
	}
	}
	function mpagos(){
			if($this->con->conectar()==true){
				$mes = date("m");
				$co= $mes -1;
	return mysql_query("SELECT * FROM mpagos WHERE month(fecha)='$co'");
	}
	}
		function muestrasocio1($nsocio){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM socios WHERE nsocio !=0 AND nsocio=".$nsocio);
	}
	}
			function muestrapagar($nsocio){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM pagosocios WHERE nsocio=".$nsocio);
	}
			}
		function muestracprestamo($id_tp){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM mprestamos WHERE id_tp=".$id_tp);
	}
	}
		function muestraestados(){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM estados");
	}
	}
		function muestravehiculo1($nsocio){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM vehiculos WHERE id_s=".$nsocio);
	}
	}
			function muestraavance($nsocio){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM avances WHERE id_s=".$nsocio);
	}
	}
			function muestraavance1($nsocio,$navance){
			if($this->con->conectar()==true){
	return mysql_query("SELECT * FROM avances WHERE nsocio='".$nsocio."'AND navance='".$navance."'");
	}
	}

		function insertarusuario($campos){
		if($this->con->conectar()==true){
			//print_r($campos);
			//echo "INSERT INTO coordinador (nombre, direccion, telefono, correo) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."')";
			$pass=md5($password);
			return mysql_query("INSERT INTO usuarios (nombre, apellido, login, password, email, privilegio ) VALUES ('".$campos[0]."', '".$campos[1]."','".$campos[2]."','".$campos[3]."','".$campos[4]."','".$campos[5]."')");
		}
	}
		function actualizar($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE usuarios SET nombre = '".$campos[0]."', apellido = '".$campos[1]."', login = '".$campos[2]."', email = '".$campos[3]."' WHERE id = ".$id);
		}
	}
		function cambiapass($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
			$pass=md5($password);
			return mysql_query("UPDATE usuarios SET password = '".$campos[0]."' WHERE id = ".$id);
		}
	}
		function mostrar_cliente($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM usuarios WHERE id=".$id);
		}
	}
	
	function mostrar_clientes(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM usuarios ORDER BY id DESC");
		}
	}
	
	
		function edita_socios($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM socios WHERE id_s=".$id);
		}
	}
		function edita_viajes($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM servicios WHERE id=".$id);
		}
	}
	function pagar_prestamo($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM prestamos WHERE id=".$id);
		}
	}
	function edita_pagosocios($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM pagosocios WHERE id=".$id);
		}
	}
	function edita_avances($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM avances WHERE id_a=".$id);
		}
	}
	function edita_proveedor($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM proveedores WHERE id_proveedor=".$id);
		}
	}
	function edita_usuarios($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM usuarios WHERE id=".$id);
		}
	}
	function edita_multas($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM multas WHERE id=".$id);
		}
	}
	function edita_vehiculo($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM vehiculos WHERE id=".$id);
		}
	}
	function consulta_combustible(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM combustible ORDER BY id ASC");
		}
	}
	
	function edita_permiso($id){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM permisos WHERE id=".$id);
		}
	}
			function mostrar_socios(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM socios ORDER BY id_s ASC");
		}
	}
	
				function mostrar_iva(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM iva");
		}
	}
		function mostrar_pagosocios(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM pagosocios ORDER BY id DESC");
		}
	}
		function mostrar_pagoavance(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM pagoavances ORDER BY id DESC");
		}
	}
		function mostrar_fpagosocios($nsocio){
		if($this->con->conectar()==true){
			return mysql_query("SELECT month(mes) FROM pagosocios WHERE id_s=$nsocio ");
		}
	}
		function mostrar_factura(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM factura ORDER BY id_f ASC");
		}
	}
			function mostrar_proveedores(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM proveedores ORDER BY id_proveedor ASC");
		}
	}
		function mostrar_facturav(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM facturav ORDER BY id_fv ASC");
		}
	}
	
		function generaavance(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * from avances WHERE id_s = ".$_GET['nsocio']." AND estado = 0 ORDER BY id_s ASC");
		}
	} 
		function generaavance1(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * from aactivos WHERE nsocio = ".$_GET['nsocio']);
		}
	} 
	
	function mostrar_multas(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM multas WHERE estado ='Pendiente'");
		}
	}
				function mostrar_permisos(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM permisos ORDER BY id DESC");
		}
	}
				function mostrar_user(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM usuarios ");
		}
	}
	
	function mostrar_combustible(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM combustible ORDER BY id DESC");
		}
	}
	
	function mostrar_piezas(){
		if ($this->con->conectar()==true){
			return mysql_query("SELECT * FROM repuestos ORDER by id_r DESC");
		}
	}
	function mostrar_facturas(){
		if ($this->con->conectar()==true){
			return mysql_query("SELECT * FROM facturav ORDER by id_fv ASC");
		}
	}
	
	function mostrar_facturasin(){
		if ($this->con->conectar()==true){
			return mysql_query("SELECT * FROM factura ORDER by id_f DESC");
		}
	}
	
	function mostrar_piezas1($id){
		if ($this->con->conectar()==true){
			return mysql_query("SELECT * FROM repuestos WHERE id_r =".$id);
		}
	}
	function mostrar_rutas(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM rutas ORDER BY id DESC");
		}
	}
	function auditoria(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM auditoria ORDER BY id ASC");
		}
	}
	function consultacorreo($cedula){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM usuarios WHERE cedula='$cedula' ");
		}
	}
	function consultalogin($login){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM usuarios WHERE login='$login' ");
		}
	}
	function recuperapw($pass,$cedula){
		if($this->con->conectar()==true){
			$passu=md5($pass);
			return mysql_query("UPDATE usuarios SET password ='$passu' WHERE cedula='$cedula' ");
		}
	}
	function consultarespuesta($respuesta){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM usuarios WHERE respuesta='$respuesta' ");
		}
	}
			function mostrar_avances(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM avances ORDER BY id_a ASC");
		}
	}
			function mostrar_vehiculos(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM vehiculos ORDER BY id ASC");
		}
	}
	function mostrar_usuarios(){
		if($this->con->conectar()==true){
			return mysql_query("SELECT * FROM usuarios ORDER BY id DESC");
		}
	}
	function eliminarsocio($id){
		if($this->con->conectar()==true){
	 		return mysql_query("DELETE FROM socios WHERE id=".$id);
		}
	}
		function anularsocio($id_s){
		if($this->con->conectar()==true){
	 		return mysql_query("UPDATE socios set estado ='1' WHERE id_s=".$id_s);
		}
	}
	function anularavance($id_a){
		if($this->con->conectar()==true){
	 		return mysql_query("UPDATE avances set estado ='1' WHERE id_a=".$id_a);
		}
	}
	function anularvehiculo($id){
		if($this->con->conectar()==true){
	 		return mysql_query("UPDATE vehiculos set estado ='1' WHERE id=".$id);
		}
	}
	function eliminarprestamo($id){
		if($this->con->conectar()==true){
	 
			return mysql_query("DELETE FROM prestamos WHERE id=".$id);
		}
	}
	function eliminargprestamo($exp){
		if($this->con->conectar()==true){
	 
			return mysql_query("DELETE FROM gastos WHERE expediente=".$exp);
		}
	}
	function eliminaripago($exp){
		if($this->con->conectar()==true){
	 
			return mysql_query("DELETE FROM ingresos WHERE expediente=".$exp);
		}
	}
		function eliminarpago($id){
		if($this->con->conectar()==true){
	 
			return mysql_query("DELETE FROM pagosocios WHERE id=".$id);
		}
	}
	function eliminarvehiculo($id){
		if($this->con->conectar()==true){
	 
			return mysql_query("DELETE FROM vehiculos WHERE id=".$id);
		}
	}
	function hsociosavances($nsocio,$nombre){
		if($this->con->conectar()==true){
	 
			return mysql_query("INSERT INTO hsociosavances (nsocio, nombre) VALUES ('$nsocio','$nombre')");
		}
	}
	function eliminarpermiso($id){
		if($this->con->conectar()==true){
	 
			return mysql_query("DELETE FROM permisos WHERE id=".$id);
		}
	}
		function eliminaravance($id){
		if($this->con->conectar()==true){
	 
			return mysql_query("DELETE FROM avances WHERE id_a=".$id);
		}
	}
	function insertarsinactivo($nsocio){
		if($this->con->conectar()==true){ 
			return mysql_query("INSERT INTO sinactivos (nsocio) VALUES ('$nsocio')");	
		}
	}
	function insertarcombustible($com){
		if($this->con->conectar()==true){ 
			return mysql_query("INSERT INTO combustible (Tipo) VALUES ('$com')");	
		}
	}
	
	function insertarruta($ruta){
		if($this->con->conectar()==true){ 
			return mysql_query("INSERT INTO rutas (nombreruta) VALUES ('$ruta')");	
		}
	}
	function eliminarsactivo($nsocio){
		if($this->con->conectar()==true){ 
			return mysql_query("DELETE FROM sactivos WHERE nsocio='$nsocio'");
		}
	}
	function insertarainactivo($nsocio,$navance){
		if($this->con->conectar()==true){ 
			return mysql_query("INSERT INTO ainactivos (nsocio,navance) VALUES ('$nsocio','$navance')");	
		}
	}
	function eliminaraactivo($nsocio,$navance){
		if($this->con->conectar()==true){ 
			return mysql_query("DELETE FROM aactivos WHERE nsocio='$nsocio' AND navance='$navance'");
		}
	}
	function creaauditoria($fecha,$ip,$login,$ev,$detalle){
		if($this->con->conectar()==true){ 
			return mysql_query("INSERT INTO auditoria (fecha, ip, usuario, evento, detalle) VALUES ('$fecha', '$ip', '$login','$ev','$detalle')");	
		}
	}
	
	
// Consulta para proveedores 


public function getInfoComboBox($colum_codigo, $colum_nombre){
		if($this->con->conectar()==true){
		$sql = mysql_query ("SELECT * FROM socios");
		$info = array(); 
		$i = 0;
		while($datos = @mysql_fetch_array($sql)){
			$info[$i] = $datos[$colum_codigo];
			$i++;
			$info[$i] = $datos[$colum_nombre];
			$i++;
		}
		return $info;
	}}
				
	function eliminarusuario($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM usuarios WHERE id=".$id);
		}
	}
function eliminarproveedor($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM proveedores WHERE id_proveedor=".$id);
		}
	}
	function eliminarcombustible($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM combustible WHERE id=".$id);
		}
	}
		function eliminarrepuesto($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM repuestos WHERE id_r=".$id);
		}
	}
			function eliminarfactura($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM facturav WHERE id_fv=".$id);
		}
	}
				function eliminarfacturain($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM factura WHERE id_f=".$id);
		}
	}
	function eliminarruta($id){
		if($this->con->conectar()==true){
			return mysql_query("DELETE FROM rutas WHERE id=".$id);
		}
	}
	
	function calendariomulta(){
		$fechamulta= date("d-m-Y",strtotime($_POST['c_fecha']));
		
		}
		
	}

	
?>