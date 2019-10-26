<?php 

class Login extends CI_Controller{
	public function index(){
		$data = array('titulo' => 'Inicio' , 'mensaje' => 'Hola mundo desde un array');
		$this->load->view('Ingreso.html',$data);
	}
}

?>