<?php 

class controladorlogin extends CI_Controller{

public function index(){
	
	$usuario=$this->input->post('user');//de esta forma almacenamos los datos del login
	$contraseña=$this->input->post('password');

	
	$this->load->model('Modelologin');//se debe cargar primeramente el modelo de esta forma
    $usuariodb=$this->Modelologin->getusuario($usuario,$contraseña);//en una variable guardamos los resultados de la base de datos con el //metodo getusuario



     
     if($usuariodb!=null){//aqui almacenamos los datros que estan en la tabla usuario

		    foreach ($usuariodb->result() as $key ) {

		    	if($key->usunombre==$usuario &&  password_verify($contraseña, $key->contraseña) ){//la password esta encriptada en db,si la contra //inigresada es igual al hash usando el metodo password_verify devolvera true
		    	$id=$key->usuid;
		    	$usuariodb=$key->usunombre;
		    	$contrasenadb=$key->contraseña;
		    	
		    	break;
		    }
		    }


		     $imagenUsuario=$this->Modelologin->getImagen($id);  //el id es para identificar el usuario loguead

     if($imagenUsuario!=null){

		    foreach ($imagenUsuario->result() as $key ) {

		    	$imagen=$key->imagen;;
		    	
		    	
		    	break;
		    }
		    
        } else{
        	$imagen='es nulo';
        }
        }

   




    if($usuariodb!=null){//si esta variable es diferente de null quiere decir que se obtuvo un usuario de la base de datos
    	//por lo tanto almacenamos dentro de data los valores correspondientes al usuario logeado
        $data = array(
        'id'=>	$id,
		'usuario' => $usuariodb,
		'contraseña' => $contrasenadb,
		'imagen' => $imagen,
		'inicio' => true
	    );
	    $this->session->set_userdata($data);//almacenams lpos datos en una session
		header("location:".base_url());//

    }else{
    	$mensaje='usuario o contraseña incorrecto';
    	header("location:".base_url()."?errorlogin=true");//si usuariodb es null es por que no se obtuvieron datos de el usuer digititado, asi q //redirexionamos al inicio
    	
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
		$contraseña_encriptada= password_hash($nuevacontraseña, PASSWORD_BCRYPT);//encriptamos la contraseña
		$this->load->model('modelologin');

	    $this->modelologin->registro($nuevousuario,$contraseña_encriptada);
	    
	    header('location: '.base_url()."?creado=true" );
	}else{
		
		header('location: '.base_url() ."?creado=false");
	}

	
}

}

 ?>