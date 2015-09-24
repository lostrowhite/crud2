<?php

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model( 'mUsers' );
	}
	
	public function index()
	{
		$this->load->view( 'home' );
	}
	
	public function getById( $id ) {
		if( isset( $id ) )
			echo json_encode( $this->mUsers->getById( $id ) );
	}
	
	public function create() {
		if( !empty( $_POST ) ) {
			 echo  $this->mUsers->create();
			//echo 'Usuario Creado Satisfactoriamente!';
		}
	}
	
	public function read() {
		echo json_encode( $this->mUsers->getAll() );
	}
	
	public function update() {
		if( !empty( $_POST ) ) {
			$this->mUsers->update();
			echo 'Usuario Editado Satisfactoriamente!';
		}
	}
	
	public function delete( $id = null ) {
		if( is_null( $id ) ) {
			echo 'ERROR: Id not provided.';
			return;
		}
		
		$this->mUsers->delete( $id );
		echo 'Usuario Eliminado Satisfactoriamente';
	}

} //end class
