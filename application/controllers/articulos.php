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
	   $contenido=$this->input->post('contenido');

	   $sql= " insert into post (descripcion,fecha,imagen,postUsuId,contenido) values ('$nuevopost',now(),'sin imagen',".$this->session->userdata('id').",'$contenido')";
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
		
       
        $idpost=$_GET['idpost'];
        $resultado=$this->load->ModeloPost->obtenerDato($idpost);
		$data=array('res' => $resultado);


		$this->load->view('header.html',$data);
		$this->load->view('postactualizar.html',$data);
		$this->load->view('footer.html');
	} 


	function vercontenido(){//--------------
		
		$this->load->view('head.html');
		$this->load->view('navegacion.html');

		  $idpost=$_GET['idpost'];
        $resultado=$this->load->ModeloPost->obtenerDato($idpost);
		$data=array('res' => $resultado);


		$this->load->view('header.html',$data);
     	$this->load->view('contenidopost.html',$data);
		$this->load->view('footer.html');
	}


	function actualizarpost(){

		//$descripcion=$_POST['postactualizar'];
		//echo $descripcion;
		
		

	if($this->session->userdata('inicio')){
		$idpost=$_GET['id'];
        $descripcion=$this->input->post('postactualizar');
        $contenido=$this->input->post('nuevocontenido');
		
		
 	   


 	    if(isset($_POST['actualizarpost'])){

           if ($_FILES['upload']['name']!=null ){//esto es para validar que hay algo en el submit tipo file
           	    $file_temp= $_FILES['upload']['tmp_name'];
	            $imgContent = addslashes(file_get_contents($file_temp));//convertimos en archivo binario la img


		        $sql="update post set descripcion='".$descripcion."',fecha= now(),contenido='".$contenido."',imagen='".$imgContent."' where id=".$idpost.";";
                $resultado=$this->db->query($sql);//aqui estamos consultando en la base de datos
		 
                header('location: '.base_url().'articulos/vercontenido?idpost='.$idpost);
           }else{
           	$sql="update post set descripcion='".$descripcion."',fecha= now(),contenido='".$contenido."' where id=".$idpost.";";
           $resultado=$this->db->query($sql);//aqui estamos consultando en la base de datos
            header('location: '.base_url().'articulos/vercontenido?idpost='.$idpost);
           }
       }
	      
		
	}
 	  


	}
	
}








 ?>