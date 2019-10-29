<?php

class ModeloPost extends CI_Model{

function obtenerDatos(){
 	  $resultado=$this->db->get('post');//aqui estamos consultando en la base de datos
 	  return $resultado;
}   

}


?>