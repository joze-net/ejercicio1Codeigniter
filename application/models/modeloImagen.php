<?php 

class ModeloImagen extends CI_Model{

Public $nombreImagen;

 function subirImagen($nombreImg)

 {

 	if($this->session->userdata('inicio'))
 	{

	$this->nombreImagen=$nombreImg;
	$sql="update post set imagen='".$this->nombreImagen."' where postUsuId=".$this->session->userdata('id');
	$this->db->query($sql);

    }
}


function getImagen(){


   if($this->session->userdata('inicio'))
 	{

 		$sql='select imagen from post where postUsuId ='.$this->session->userdata('id');
      $img= $this->db->query($sql);
      

	
	


	
        
        
        //Render image
        
        return $img;
      

     /* $archivo = $archiv;
      $fp = fopen ($archivo, 'r');

      $datos = fread ($fp, filesize ($archivo)); // cargo la imagen
      fclose($fp);  
  */
       	


    


    }
}
}
/**
 * 
 */


 ?>