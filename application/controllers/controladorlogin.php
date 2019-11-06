<?php 

class controladorlogin extends CI_Controller{

public function index(){
	
	$usuario=$this->input->post('user');//de esta forma almacenamos los datos del login
	$contraseña=$this->input->post('password');

	$data = array(
		'usuario' => $usuario,
		'contraseña' => $contraseña,
		'inicio' => true
	);

	$this->session->set_userdata($data);//almacenams lpos datos en una session

	echo $this->session->userdata('usuario');//asi los mostramos
}

}

 ?>