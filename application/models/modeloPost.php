<?php

class ModeloPost extends CI_Model{

function obtenerDatos(){
	if($this->session->userdata('inicio')){
		$sql='select * from post  where postUsuId='.$this->session->userdata("id").' order by fecha desc';
       $resultado=$this->db->query($sql);//aqui estamos consultando en la base de datos
 	  return $resultado;
	}else{
		return null;
	}
 	  

} 

function obtenerDato($idpost){
	
		$sql='select * from post where id='.$idpost;
       $resultado=$this->db->query($sql);//aqui estamos consultando en la base de datos
 	  return $resultado;
	
 	  

}

function totalidadPost(){
	
		$sql='select id,descripcion,usunombre,usunombre,fecha from post inner join usuarios on postUsuId=usuid  order by fecha desc';
       $resultado=$this->db->query($sql);//aqui estamos consultando en la base de datos
 	  return $resultado;
	
 	  

} 





}


?>