<?php 

class ModeloImagen extends CI_Model{

Public $nombreImagen;




 function subirImagen($nombreImg)

 {

 	if($this->session->userdata('inicio'))
 	{

	$this->nombreImagen=$nombreImg;
	$sql="update usuarios set imagen='".$this->nombreImagen."' where usuId=".$this->session->userdata('id');
	$this->db->query($sql);



    }
}


function getImagen(){


   if($this->session->userdata('inicio'))
 	{

 		$sql='select imagen from usuarios where usuId ='.$this->session->userdata('id');
    $img= $this->db->query($sql);
    return $img;
      
    }
}





		function verImagen(){



		 $this->load->model('modeloImagen');
		$img=$this->modeloImagen->getImagen();//cargamos la img de la bd

        if($img!=null){

		    foreach ($img->result() as $key ) {

		    	$imagen=$key->imagen;
		    	header("Content-Type: jpg");
		    	return  $imagen;
		    	break;
		    }
		    
        } else{
        	$imagen='es nulo';
        }


        }



  function verImagenpost($id){



      $sql='select imagen from post where id='.$id;
      $img= $this->db->query($sql);
      

      if($img!=null){

          foreach ($img->result() as $key ) {

            $imagen=$key->imagen;
            header("Content-Type: jpg");
            return  $imagen;
            break;
          }
        
      } else{
          $imagen='es nulo';
        }


  }


}
/**
 * 
 */


 ?>