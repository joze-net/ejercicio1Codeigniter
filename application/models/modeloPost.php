<?php

class ModeloPost extends CI_Model{

function obtenerDatos(){
	 $this->session->sess_destroy();
 	  $resultado=$this->db->get('post');//aqui estamos consultando en la base de datos
 	  return $resultado;

}   

}


?>