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

}
/**
 * 
 */


 ?>