<?php 

class controladorblog extends CI_Controller{
	public function index(){
		
		
		$this->load->view('head.html');
		$this->load->view('navegacion.html');
		$this->load->view('header.html');
        $this->load->model('ModeloPost');//para cragar el modelo tambien se debe cargar de esta manera
		$c=new ModeloPost();

        $resultado=$c->obtenerDatos();
		$data=array('res' => $resultado);

		$this->load->view('contenido.html',$data);
		$this->load->view('footer.html');
		
	}
}

?>