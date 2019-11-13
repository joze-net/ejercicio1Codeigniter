<?php 

class Modelologin extends CI_Model{

    function getUsuario($usuario,$contraseña){
       $user=$this->db->get('usuarios');
       foreach($user->result() as $usu){
       	if($usu->usunombre==$usuario && $usu->contraseña==$contraseña){
       		return $user;
       	}else{
       		return null;
       	}
       }
       
   }	

}

 ?>