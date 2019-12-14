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

function configurar()
{
	$this->load->view('head.html');
		$this->load->view('navegacion.html');
		$this->load->view('header.html');
          //  echo site_url()
        $this->load->view('personalizar.html');
		$this->load->view('footer.html');
}


function cambiarnombre()
{
	if ($this->session->userdata('inicio')) //se debe haber iniciado session
	{
		$nuevoNombre=$_POST['nuevonombre'];//obtenemos el nombre digitado
		$this->load->model('modelologin');//lamamos el modelo que tiene la funcion de cambiar el nombre en bd
		$this->modelologin->nuevonombre($nuevoNombre);//llamamos el metodo encargado 
		

//aqui guardamos los datos de session en variables y poder manipular los datos para crear nuevamente los datos de session
		$id=$this->session->userdata('id');
		$contrasenadb=$this->session->userdata('contraseña');
		$imagen=$this->session->userdata('imagen');
		//----------------------------------------------------------
		//establecemos los datos de que pasamos por parametro a al sesion

		 $data = array(
        'id'=>	$id,
		'usuario' => $nuevoNombre,//este es el dato de session que cambiamos por el nuevo nombre
		'contraseña' => $contrasenadb,
		'imagen' => $imagen,
		'inicio' => true
	    );
		 //-------------------------------------------
		 //creamos la session

		  $this->session->set_userdata($data);

//redireccionamos a la pagina de perzonalizar
		  header('location: http://localhost/pruebaCodeigniter/controladorlogin/configurar');
	}
}


function cambiarcontrasena()
{
	if ($this->session->userdata('inicio')) //se debe iniciar session
	{
		$nuevacontraseña=$_POST['nuevacontraseña'];///obtenemos la contraseña del campo de texto
		$confirmarcontraseña=$_POST['confirmarnuevacontraseña'];//tambn la confirmacion

		if ($nuevacontraseña==$confirmarcontraseña) //los dos datos debenn ser iguales
		{
            $password= password_hash($nuevacontraseña, PASSWORD_BCRYPT);//encriptamos la contraseña
			$this->load->model('modelologin');//este modelo tiene la funcion para hacer la actualizacion
			$this->modelologin->cambiarpassword($this->session->userdata('id'),$password);//llamamos el metodo y le pasamos los parametros necesarios
			header('location: http://localhost/pruebaCodeigniter/controladorlogin/configurar');
		}else{
			header('location: http://localhost/pruebaCodeigniter/controladorlogin/configurar');
		}



	}
}

}

 ?>