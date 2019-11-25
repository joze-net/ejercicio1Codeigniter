<?php 

class controladorblog extends CI_Controller{
	public function index(){
		
		$GLOBALS['creado'] = "nnnn";//almacenamos creadoe en una variable superglobal y poder accerder a ella desde otro archivo
		if(isset($_GET['creado'])){//con isset sabremos si la variablle a sido creada
			$GLOBALS['creado'] = $_GET['creado'];
		}
    // header('location: http://localhost/pruebaCodeigniter/articulos/mostrar');
    
		$this->load->view('head.html');
		$this->load->view('navegacion.html');
		$this->load->view('header.html');
          //  echo site_url();

        
		$this->load->view('contenido.html');
		$this->load->view('footer.html');
	


	}
}

?>