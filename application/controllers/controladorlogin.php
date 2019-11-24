<?php 

class controladorlogin extends CI_Controller{

public function index(){
	
	$usuario=$this->input->post('user');//de esta forma almacenamos los datos del login
	$contraseña=$this->input->post('password');

	
	$this->load->model('Modelologin');//se debe cargar primeramente el modelo de esta forma
    $usuariodb=$this->Modelologin->getusuario($usuario,$contraseña);//en una variable guardamos los resultados de la base de datos con el //metodo getusuario



     
     if($usuariodb!=null){

		    foreach ($usuariodb->result() as $key ) {

		    	if($key->usunombre==$usuario && $key->contraseña==$contraseña){
		    	$id=$key->usuid;
		    	$usuariodb=$key->usunombre;
		    	$contrasenadb=$key->contraseña;
		    	break;
		    }
		    }
        }   



    if($usuariodb!=null){//si esta variable es diferente de null quiere decir que se obtuvo un usuario de la base de datos
    	//por lo tanto almacenamos dentro de data los valores correspondientes al usuario logeado
        $data = array(
        'id'=>	$id,
		'usuario' => $usuariodb,
		'contraseña' => $contrasenadb,
		'inicio' => true
	    );
	    $this->session->set_userdata($data);//almacenams lpos datos en una session
		header("location:".base_url());//

    }else{
    	
    	header("location:".base_url());//si usuariodb es null es por que no se obtuvieron datos de el usuer digititado, asi q //redirexionamos al inicio
    	
    }
	

	//echo $this->session->userdata('usuario');//asi los mostramos
}


function cerrarSesion(){
	$this->session->sess_destroy();
	header('location: '. base_url());
}



function registrarse(){

	$nuevousuario=$this->input->post('nuevouser');//de esta forma almacenamos los datos del login
	$nuevacontraseña=$this->input->post('nuevopassword');
	$confirmarcontraseña=$this->input->post('confirmarpassword');
    $GLOBALS['creado']='';

	if ($nuevacontraseña==$confirmarcontraseña && $nuevacontraseña!="") {
		$this->load->model('modelologin');
	    $this->modelologin->registro($nuevousuario,$nuevacontraseña);
	    
	    header('location: '.base_url()."?creado=true" );
	}else{
		
		header('location: '.base_url() ."?creado=false");
	}

	
}

}

 ?>