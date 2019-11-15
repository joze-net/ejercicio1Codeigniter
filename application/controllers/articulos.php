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


public function nuevo(){


	
		$this->load->view('head.html');
		$this->load->view('navegacion.html');
		$this->load->view('header.html');
       
        
		$this->load->view('postnuevo.html');
		$this->load->view('footer.html');
		
        
	}


	public function guardarpost(){
	   

	   $nuevopost=$this->input->post('nuevopost');//guardamos el post escrito desde el form de postnuevo
	   

	   $sql= " insert into post (descripcion,fecha) values ('$nuevopost',now())";
	   $this->db->query($sql);//almacenamos en la bd

	   header('location: '. base_url().'articulos/mostrar');




}
}



 ?>