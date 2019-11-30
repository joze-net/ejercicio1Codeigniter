<?php 

/**
 * 
 */
class Manejoimagenes extends CI_Controller
{
	
	function cargaImagen(){
		
        $this->load->model('modeloImagen');

        if(isset($_POST['Subir'])){
	       $file_temp= $_FILES['upload']['tmp_name'];
	       $imgContent = addslashes(file_get_contents($file_temp));//convertimos en archivo binario la img


		 $this->modeloImagen->subirImagen($imgContent );//pasamos por parametro el nombre de la img
		 

		}
		
       header('location: http://localhost/pruebaCodeigniter/articulos/mostrar');//redireccionamos a la pagina actual


	     
/*
	     $img=$this->input->post('upload');

		 $imagen='upload';
		 $config['upload_path']="upload/";//carpeta donde se gurdara las imgenes
		// $config['file_name']="nombre_archivo";//esto es opcional
		 $config['allowed_types']="jpg|png";//los datos permitidos
		 $config['maxsize']='5000';//kb
		 $config['max_width']='2000';
		 $config['max_heigth']='2000';

		 $this->load->library('upload',$config);//cargamos la libreria donde esta la carpeta y pasamos la configuracion

		 if(!$this->upload->do_upload($imagen)){//esto es para subir el archivo devuelve true o false


		 	$data['uploadError']=$this->upload->display_errors();
		 	echo $this->upload->display_errors();
		 	
		 	return;
		 }

		 $data['uploadSuccess']=$this->upload->data();
		 var_dump($this->upload->data($img));//si es exotoso, esta funcion muetra el contenido de un var
*/
		
	}

	function vizualizarImagen(){
		$this->load->model('modeloImagen');
		 echo $this->modeloImagen->verImagen();

	}

}

 ?>