<?php 

class controladorlogin extends CI_Controller{

public function index(){
	
	$usuario=$this->input->post('user');//de esta forma almacenamos los datos del login
	$contraseña=$this->input->post('password');

	
	$this->load->model('Modelologin');//se debe cargar primeramente el modelo de esta forma
    $usuariodb=$this->Modelologin->getusuario($usuario,$contraseña);//en una variable guardamos los resultados de la base de datos con el //metodo getusuario
     
    if($usuariodb!=null){//si esta variable es diferente de null quiere decir que se obtuvo un usuario de la base de datos
    	//por lo tanto almacenamos dentro de data los valores correspondientes al usuario logeado
        $data = array(
		'usuario' => $usuario,
		'contraseña' => $contraseña,
		'inicio' => true
	);
    }else{
    	$data=null;
    }
	$this->session->set_userdata($data);//almacenams lpos datos en una session

	echo $this->session->userdata('usuario');//asi los mostramos
}

}

 ?>