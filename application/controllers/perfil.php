<?php 

/**
 * 
 */
class Perfil extends CI_Controller
{
	
	public function index() {
		$this->load->view('head.html');
		$this->load->view('navegacion.html');
		$this->load->view('header.html');
          //  echo site_url();
        
        
		$this->load->view('vistaperfil.html');
		$this->load->view('footer.html');
	}
}

 ?>