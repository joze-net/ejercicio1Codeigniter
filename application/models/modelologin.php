<?php 

class Modelologin extends CI_Model{

    function getUsuario($usuario,$contraseña){
       $user=$this->db->get('usuarios');
       $validado=false;
       foreach($user->result() as $usu){

       	if($usu->usunombre==$usuario && $usu->contraseña==$contraseña){
       		$validado=true;
          break;//para salir del foreach, cuando encuntre un reultado
       	}else{
       		$validado=false;
       	}
       }

       if ($validado) {
         return $user;
       }else{
        return null;
       }
       
   }	

   public function registro($usuario,$contraseña){
    $sql="insert into usuarios (usunombre,contraseña) values('$usuario','$contraseña');";
      $registroUsuario=$this->db->query($sql);
   }

}

 ?>