<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class APIControlador extends ResourceController
{
    protected $modelName = 'App\Models\ModeloAnimal';
    protected $format    = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function registrar(){

        //1.Recibiendo datos desde el cliente
        $nombre=$this->request->getPost("nombre");
		$edad=$this->request->getPost("edad");
		$tipo=$this->request->getPost("tipo");
		$comida=$this->request->getPost("comida");
		$descripcion=$this->request->getPost("descripcion");
        $foto=$this->request->getPost("foto");
        
        //2.Organizar los datos de envio a la base datos en un arreglo asociativo
		$datosEnvio=array(
			"nombreanimal"=>$nombre,
			"edad"=>$edad,
			"tipoanimal"=>$tipo,
			"comida"=>$comida,
			"descripcion"=>$descripcion,
			"foto"=>$foto
        );
        
     //3.   
	if ($this->validate('animalPOST')) {
        $id=$this->model->insert($datosEnvio);
        return $this->respond($this->model->find($id));
	} else {
        $validation = \Config\Services::validation();
		return $this->respond("falla");
	}
		
    }
    public function consultar($id){

         //1.Recibiendo datos desde el cliente
         $nombre=$this->request->getPost("nombre");
         $edad=$this->request->getPost("edad");
         $tipo=$this->request->getPost("tipo");
         $comida=$this->request->getPost("comida");
         $descripcion=$this->request->getPost("descripcion");
         $foto=$this->request->getPost("foto");
         
         //2.Organizar los datos de envio a la base datos en un arreglo asociativo
         $datosEnvio=array(
             "nombreanimal"=>$nombre,
             "edad"=>$edad,
             "tipoanimal"=>$tipo,
             "comida"=>$comida,
             "descripcion"=>$descripcion,
             "foto"=>$foto
         );
         
      //3.   
     if ($this->validate('animalGET')) {
         $id=$this->model->insert($datosEnvio);
         return $this->respond($this->model->find($id));
     } else {
         $validation = \Config\Services::validation();
         return $this->respond("falla");
     }
	}

    public function eliminar($id){
        $consulta = $this->model->where('id',$id)->delete();
        $filasAfectadas=$consulta->connID->affected_rows;

        if ($filasAfectadas==1) {
            $mensaje=array("mensaje"=>"Registro eliminado con exito");
            return $this->respond(json_encode($mensaje));
           
        } else {
            $mensaje=array("mensaje"=>"El id no se encuentra");
            return $this->respond(json_encode($mensaje),400);
        }
        
        
    }
    public function editar($id){
        //1.Recibir los datos a editar (se almacenan como un arreglo)
        $datosAEditar=$this->request->getRawInput();

        //2.depurar e arreglo de datos separando cada uno.
        $nombre=$datosAEditar["nombre"];
        $edad=$datosAEditar["edad"];

        //3.ordenar los datos para el envio hacia l abase de datos
        $datosEnvio=array(
			"nombreanimal"=>$nombre,
			"edad"=>$edad
        );

        //4. aplico validaciones y ejecuto la consulta
        if ($this->validate('animalPUT')) {
            
            $this->model->update($id,$datosEnvio);
            
        return $this->respond($this->model->find($id));

        } else {
            $validation = \Config\Services::validation();
		    return $this->respond($validation->getErrors());
        }
        
    }
}