<?php

class ModeloPost extends CI_Model{

function obtenerDatos(){
	if($this->session->userdata('inicio')){
       $resultado=$this->db->get('post');//aqui estamos consultando en la base de datos
 	  return $resultado;
	}else{
		return null;
	}
 	  

}   

}


?>