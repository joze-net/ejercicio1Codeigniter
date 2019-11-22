<?php

class ModeloPost extends CI_Model{

function obtenerDatos(){
	if($this->session->userdata('inicio')){
		$sql='select * from post order by id desc';
       $resultado=$this->db->query($sql);//aqui estamos consultando en la base de datos
 	  return $resultado;
	}else{
		return null;
	}
 	  

} 

function obtenerDato($idpost){
	if($this->session->userdata('inicio')){
		$sql='select * from post where id='.$idpost;
       $resultado=$this->db->query($sql);//aqui estamos consultando en la base de datos
 	  return $resultado;
	}else{
		return null;
	}
 	  

}





}


?>