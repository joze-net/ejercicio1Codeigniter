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
       
         $resultado=$this->load->ModeloPost->obtenerDatos();
		$data=array('res' => $resultado);
		$this->load->view('postnuevo.html');
		$this->load->view('footer.html');
		
        
	}


	public function guardarpost(){
	   

	   $nuevopost=$this->input->post('nuevopost');//guardamos el post escrito desde el form de postnuevo
	   

	   $sql= " insert into post (descripcion,fecha,imagen,postUsuId) values ('$nuevopost',now(),'sin imagen',".$this->session->userdata('id').")";
	   $this->db->query($sql);//almacenamos en la bd

	   header('location: '. base_url().'articulos/mostrar');




}


	function eliminarpost(){
		$idpost=$_GET['idpost'];
		if($this->session->userdata('inicio')){
		    $sql='delete from post where id='.$idpost.';';
       		$this->db->query($sql);//aqui estamos consultando en la base de datos
       		header('location: '. base_url().'articulos/mostrar');
		}
}


	function cargarpost(){
		$this->load->view('head.html');
		$this->load->view('navegacion.html');
		$this->load->view('header.html');
       
        $idpost=$_GET['idpost'];
        $resultado=$this->load->ModeloPost->obtenerDato($idpost);
		$data=array('res' => $resultado);


		
		$this->load->view('postactualizar.html',$data);
		$this->load->view('footer.html');
	} 


	function actualizarpost(){

		//$descripcion=$_POST['postactualizar'];
		//echo $descripcion;
		
		

	if($this->session->userdata('inicio')){
		$idpost=$_GET['id'];
        $descripcion=$this->input->post('postactualizar');
		echo $descripcion;
		$sql="update post set descripcion='".$descripcion."' where id=".$idpost.";";
       $resultado=$this->db->query($sql);//aqui estamos consultando en la base de datos
 	   header('location: '.base_url().'articulos/mostrar');
	}
 	  


	}
	
}








 ?>