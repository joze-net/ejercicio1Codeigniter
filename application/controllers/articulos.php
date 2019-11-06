<?php 

class articulos extends CI_Controller{

	public function mostrar(){


	
		$this->load->view('head.html');
		$this->load->view('navegacion.html');
		$this->load->view('header.html');
        

        $resultado=$this->load->ModeloPost->obtenerDatos();
		$data=array('res' => $resultado);

		$this->load->view('vista1.html',$data);
		$this->load->view('footer.html');
		
        
	}

}

 ?>