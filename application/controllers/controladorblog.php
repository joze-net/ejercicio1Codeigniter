<?php 

class controladorblog extends CI_Controller{
	public function index(){
		
		
		$this->load->view('head.html');
		$this->load->view('navegacion.html');
		$this->load->view('header.html');
          //  echo site_url();

        $resultado=$this->load->ModeloPost->obtenerDatos();
		$data=array('res' => $resultado);

		$this->load->view('contenido.html',$data);
		$this->load->view('footer.html');
		
	}
}

?>