<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administracion extends CI_Controller{	
	public function __construct(){
        parent::__construct();
		$this->load->library('Datatables');
        $this->load->library('table');
        $this->load->database();
 		$this->load->helper('url');
		$this->load->helper('xcrud');
        /* ------------------ */ 
        $this->load->library('grocery_CRUD');
		$this->load->library('Template');
		$this->load->model('tutorial_model');
		// $this->load->model('administracionModel');
    }
	public function transacciones(){
			 $xcrud = Xcrud::get_instance();
			 $xcrud->table_name('Transacciones');
			 $xcrud->table('t_d_transaction');
			 
			 //$xcrud->label(array('t_d_report_id' => 'Id','description' => 'Descripcion'));
			 $this->template->write('content', $xcrud);
			 $this->template->render();

	}
	public function index(){
		if( $this->session->userdata('isLoggedIn') ) {
            redirect('/main/show_main');
        } else {
        $data['title']='Inicio';
		$data['main_content']='registration_view';
		$this->load->view('main_templatei',$data);
        }
	}

	public function vista(){
		$xcrud = Xcrud::get_instance();
		$xcrud->table('t_d_budget');
		$xcrud->table_name('Presupuesto Con Financiamiento Aprobado');
		$xcrud->relation('id_account','t_d_account','id_account','code');
		// $xcrud->relation('id_program','t_d_program','id_program','cod_program');
		$xcrud->relation('id_program','t_d_program','id_program','name');
		$xcrud->relation('id_fund','t_d_fund','id_fund','id_fund');
		$xcrud->relation('id_dept','t_d_department','id_dept','code');
		$xcrud->label(array('id_account' => 'Partida','id_program' => 'Programa','id_fund' => 'Fondo','id_dept' => 'Unidad Ejecutora', 'amount			' => 'Monto'));
		$this->template->write('content', $xcrud);
		$this->template->render();
	}

	public function partidas(){
		$partidas = Xcrud::get_instance();
		$partidas->table_name('Partidas');
		$partidas->table('t_d_account');
		$partidas->label(array('id_t_account' => 'Tipo','code_account' => 'Código','name_account' => 'Nombre de Cuenta'));
		$partidas->relation('id_t_account', 't_d_type_account', 'id_t_account', 'name');

		$this->template->write('content', $partidas);
		$this->template->render();
	}

	public function departamentos(){
		$xcrud = Xcrud::get_instance();
		$xcrud->table_name('Unidades Ejecutoras');
		$xcrud->table('t_d_department');
		$xcrud->relation('id_program','t_d_program','id_program','name_program');
		$xcrud->label(array('id_dept' => 'Id','id_program' => 'Programa','name_dept' => 'Nombre','code_dept' => 'Unidad Ejecutora'));
		$this->template->write('content', $xcrud);
		$this->template->render();
	}

	public function enviada(){
		$xcrud = Xcrud::get_instance();
		$xcrud->table_name('Correspondencia Enviada');
		$xcrud->table('enviadap');
		$xcrud->change_type('ruta', 'file', '', array('not_rename'=>true,'text'=>'Documento Digitalizado','path'=>'/var/www/Correspondencia/enviado'));
		$xcrud->change_type('rutaa', 'file', '', array('not_rename'=>true,'text'=>'Anexo Digitalizado','path'=>'/var/www/Correspondencia/enviado'));
		$xcrud->change_type('fechac,fecharec,fechaent','date');
		$xcrud->pass_default('user', $this->session->userdata('login'));
		// $xcrud->set_attr('user',array('class'=>'inhab'));
		$xcrud->set_attr('anexo',array('class'=>'anexo'));
		$xcrud->set_attr('rutaa',array('id'=>'anex'));
		$xcrud->readonly('user');
		$xcrud->change_type('anexo', 'select', '', array('SI','NO'));
		$xcrud->relation('tipocorr','tipo_oficio','id_t_o','tipo_oficio');
		$xcrud->relation('facdep','dependencias','id_dep','nombre');
		$xcrud->relation('divisionrem','organigrama','id','nombre');
		$xcrud->relation('unidaddes','divisiones','nombre_div',array('nombre_div'),'','','',' ','','idd','facdep');
		$xcrud->label(array('user' => 'Usuario', 'ndoc' => 'Rel', 'ncorr' => 'N° Correspondencia', 'nombredes' => 'Nombre Destinatario', 'facdep' => 'Fac/dep Destinatario', 'unidaddes' => 'Unidad Destinatario', 'nombrerem' => 'Nombre Remitente', 'divisionrem' => 'Division Remitente', 'fechac' => 'Fecha Creación', 'tipocorr' => 'Tipo de Documento', 'recibidopor' => 'Recibido Por', 'fecharec' => 'Fecha Recepción','ruta' => 'Doc. Digitalizado', 'anexo' => 'Tiene Anexo?', 'rutaa' => 'Doc.(Anexo) Digitalizado '));
		$xcrud->fields('user, ncorr, nombredes, facdep, unidaddes, nombrerem, divisionrem, fechac, tipocorr, fecharec, ruta, asunto, observaciones, anexo, rutaa');
		$xcrud->columns('user, ndoc, ncorr, nombredes, facdep, unidaddes, nombrerem, divisionrem, fechac, tipocorr, fecharec, ruta, asunto, observaciones, anexo, rutaa');
		$xcrud->validation_required('user, ndoc, ncorr, nombredes, facdep, unidaddes, nombrerem, divisionrem, fechac, tipocorr, recibidopor, fecharec, entregado, fechaent, ruta, asunto, observaciones');
		$xcrud->order_by('id','desc');
		$this->template->write('content', $xcrud);
		$this->template->render();
	}
	public function recibida(){
		$xcrud = Xcrud::get_instance();
		$xcrud->table_name('Correspondencia Recibida');
		$xcrud->table('recibidap');
		$xcrud->change_type('ruta', 'file', '', array('not_rename'=>true,'text'=>'Documento Digitalizado','path'=>'/var/www/Correspondencia/oficios'));
		$xcrud->change_type('rutaa', 'file', '', array('not_rename'=>true,'text'=>'Anexo Digitalizado','path'=>'/var/www/Correspondencia/oficios'));
		$xcrud->change_type('fechac,fecharec,fechaent','date');
		$xcrud->pass_default('user', $this->session->userdata('login'));
		$xcrud->pass_default('recibidopor', $this->session->userdata('nombre')." ".$this->session->userdata('apellido'));
		// $xcrud->set_attr('user',array('class'=>'inhab'));
		// $xcrud->set_attr('recibidopor',array('class'=>'inhab'));
		$xcrud->readonly('user,recibidopor');
		$xcrud->change_type('anexo', 'select', '', array('SI','NO'));
		$xcrud->relation('tipocorr','tipo_oficio','id_t_o','tipo_oficio');
		$xcrud->relation('facdep','dependencias','id_dep','nombre');
		$xcrud->relation('divisionrem','organigrama','id','nombre');
		$xcrud->relation('unidadrem','divisiones','id',array('nombre_div'),'','','',' ','','idd','facdep');
		$xcrud->label(array('user' => 'Usuario', 'ndoc' => 'Rel', 'ncorr' => 'N° Correspondencia', 'nombredes' => 'Nombre Destinatario', 'facdep' => 'Fac/dep Remitente', 'unidadrem' => 'Unidad Remitente', 'nombrerem' => 'Nombre Remitente', 'divisionrem' => 'Division Destinatario', 'fechac' => 'Fecha Creación', 'tipocorr' => 'Tipo de Documento', 'recibidopor' => 'Recibido Por', 'fecharec' => 'Fecha Recepción','ruta' => 'Doc. Digitalizado', 'anexo' => 'Tiene Anexo?', 'rutaa' => 'Doc.(Anexo) Digitalizado '));
		$xcrud->fields('user, ncorr, nombredes, divisionrem, facdep, unidadrem, nombrerem,fechac, tipocorr, recibidopor, fecharec, ruta, asunto, observaciones, anexo, rutaa');
		$xcrud->columns('user, ndoc, ncorr, nombredes, divisionrem, facdep, unidadrem, nombrerem, fechac, tipocorr, recibidopor, fecharec, ruta, asunto, observaciones, anexo, rutaa');
		$xcrud->validation_required('user, ndoc, ncorr, nombredes, facdep, unidadrem, nombrerem, divisionrem, fechac, tipocorr, recibidopor, fecharec, entregado, fechaent, ruta, asunto, observaciones, anexo, rutaa');
		$xcrud->order_by('id','desc');
		// $xcrud->unset_edit(true,'user','=','yramirez');
		$this->template->write('content', $xcrud);
		$this->template->render();
	}
	public function gestionarcorrespondencia(){
		$dependencias = Xcrud::get_instance();
		$dependencias->table_name('Dependencias');
		$dependencias->table('dependencias');
		$divisiones = $dependencias->nested_table('Unidad/division', 'id_dep', 'divisiones', 'idd');
        $divisiones->table_name('Unidad/division');
        $divisiones->default_tab('Unidad/division');
        $dependencias->start_minimized(true);
        $tipos = Xcrud::get_instance();
		$tipos->table_name('Tipos de Oficios');
		$tipos->table('tipo_oficio');
		$tipos->start_minimized(true);
		$this->template->write('content', $dependencias.$tipos);
		$this->template->render();
	}

	public function programas(){
		$programas = Xcrud::get_instance();
		$programas->table_name('Programas');
		$programas->default_tab('Programas');
		$programas->table('t_d_program');
		$programas->label(array('id_program' => 'Id','name_program' => 'Nombre', 'cod_program' => 'Código'));
		$fundamental = $programas->nested_table('Actividad Fundamental','id_program','t_r_program_account','id_program');
		$fundamental->table_name('Cuentas');
		$fundamental->label(array('id_program'=>'Programa','id_account'=>'Cuenta Asociada'));
		$fundamental->relation('id_program','t_d_program','id_program','name_program');
		$fundamental->relation('id_account','t_d_account','id_account','name_account');
		$fundamental->fields('id_account');
		$this->template->write('content',  $programas->render());
		$this->template->render();
	}

	public function fuentes(){
		$fuentes = Xcrud::get_instance();
		$fuentes->table_name('Fuentes de Financiamiento');
		$fuentes->table('t_d_fund');
		$fuentes->relation('id_fund_type', 't_n_fund_type', 'id_fund_type', 'name');
		$fuentes->label(array('id_fund' => 'Id','name' => 'Nombre', 'id_fund_type' => 'Tipo de Fondo'));
		$this->template->write('content', $fuentes);
		$this->template->render();
	}

	public function productos(){
		$xcrud = Xcrud::get_instance();
		$xcrud->table_name('Productos');
		$xcrud->table('t_d_product');
		$xcrud->label(array('id_product' => 'Id','part_number' => 'Número de Parte','name' => 'Nombre'));
		$this->template->write('content', $xcrud);
		$this->template->render();
	}

	// public function all_products(){
	// 	echo $this->administracionModel->get_all_products();
	// }
}
