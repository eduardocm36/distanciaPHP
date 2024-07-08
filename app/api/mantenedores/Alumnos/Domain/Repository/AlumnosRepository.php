<?php
namespace Mnt\mantenedores\Alumnos\Domain\Repository;

use App\Utils\Utils;
use App\Utils\Service\NewError;
use Mnt\mantenedores\Alumnos\Domain\Response\AlumnosResponse;
use Mnt\mantenedores\Alumnos\Persistence\AlumnosPersistence;

class AlumnosRepository
{
    private $request;
    private $response;
    private $service;

    public function __construct($request = null, $response = null, $service = null)
    {
        $this->request = $request;
        $this->response = $response;
        $this->service = $service;
    }

    public function BuscarPorId($id)
    {
        $res = AlumnosPersistence::BuscarPorId($id);
        if(count($res)>1){
            return NewError::__Log("Usuario con más de una especialidad", 409);
        }
        $rs = new AlumnosResponse($this->service);
        $data = $rs->ListaResponse($res);

        return  empty($data) ? NewError::__Log("El id no existe", 404) : $data;
    }

}
