<?php 

class Modelologin extends CI_Model{

    function getUsuario($usuario,$contraseña)
    {
       $user=$this->db->get('usuarios');
       $validado=false;
       
       foreach($user->result() as $usu){
       
         	if($usu->usunombre==$usuario && password_verify($contraseña, $usu->contraseña)  )
          {//contraseña encriptad por eso toca usar el metoso //password_verify

       	     $validado=true;
             break;//para salir del foreach, cuando encuntre un reultado

         	}else
          {
       		   $validado=false;
        	}
       }

       if ($validado)
       {
         return $user;
       }else
       {
        return null;
       }
       
   }	

   public function registro($usuario,$contraseña){

      $sql="insert into usuarios (usunombre,contraseña,imagen) values('$usuario','$contraseña','imagen por defecto');";
      $registroUsuario=$this->db->query($sql);

   }

   public function getImagen($idusuario)
   {
  
      $sql='select imagen from post where postUsuId='.$idusuario;
      $img= $this->db->query($sql);     
      return $img;  
   }

    public function nuevonombre($nombre){

      $sql="Update usuarios set usunombre='$nombre' where usuid=".$this->session->userdata('id');
      $registroUsuario=$this->db->query($sql);

   }

    public function cambiarpassword($id,$contraseña){

      $sql="update usuarios set contraseña='$contraseña' where usuid=".$id;///actualizamos la contraseña
      $this->db->query($sql);

   }

}

 ?>