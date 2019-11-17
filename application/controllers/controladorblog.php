<?php 

class controladorblog extends CI_Controller{
	public function index(){
		
		$GLOBALS['creado'] = "nada";
		if(isset($_GET['creado'])){
			$GLOBALS['creado'] = $_GET['creado'];
		}


		$this->load->view('head.html');
		$this->load->view('navegacion.html');
		$this->load->view('header.html');
          //  echo site_url();

        
		$this->load->view('contenido.html');
		$this->load->view('footer.html');
		
	}
}

?>