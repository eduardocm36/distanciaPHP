<?php
namespace Mnt\mantenedores\Alumnos\Domain\Response;

// use Mnt\mantenedores\Epecialidades_distancia\;

use Mnt\mantenedores\Alumnos_asignaturas\Domain\Repository\Alumnos_asignaturasRepository;

class AlumnosResponse
{
    private $request;
    private $response;
    private $service;
    private $app;
    private $model;

    public function __construct($request = null, $response = null, $service = null, $app = null)
    {
        $this->request = $request;
        $this->response = $response;
        $this->service = $service;
        $this->app = $app;

        $this->model = $request ?? $response ?? $service ?? $app;
    }

     /**
     * @param $data type array
     * @return array
     */
    public function ListaResponse($data)
    {
        $alumnosAsignatura = new Alumnos_asignaturasRepository();
        $response=[];
        if(count($data)){
            foreach($data as $key => $value){
                $idCurr = $alumnosAsignatura->obtenerCurricula($data[$key]['codigo']);
                $nombres=explode(", ", $data[$key]['nombres']);
                $response[$key]["Apellido paterno"] = explode(" ", $nombres[0])[0];
                $response[$key]["Apellido materno"] = explode(" ", $nombres[0])[1];
                $response[$key]["Nombres"] = $nombres[1];
                $response[$key]["Correo Institucional"] = $data[$key]['codigo']."@undac.edu.pe";
                $response[$key]["Dni"] = $data[$key]['codigo'];
                $response[$key]["Creditos"] = 0;
                if( $idCurr == null || $idCurr == 0 ){
                    $response[$key]["Curricula"] = "";
                } else {
                    $response[$key]["Curricula"] = $idCurr . $data[$key]['espe'];
                }
                $response[$key]["Fecha de nacimiento"] = 0;
                $response[$key]["Programa facultad"] = $data[$key]['esp_nomb'];
                $response[$key]["ID_ESCUELA"] = $data[$key]['espe'];
                $response[$key]["Genero"] = "F";
                $response[$key]["Domicilio"] = "unknown";
                $response[$key]["Rol"] = "EG";
                $response[$key]["Fecha de Ingreso"] = 0;
            }
        }
        
        return $response;
    }

}
