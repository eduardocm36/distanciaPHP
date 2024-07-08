<?php
namespace Mnt\mantenedores\Alumnos_asignaturas\Domain\Repository;

use App\Utils\Utils;
use App\Utils\Service\NewError;
use Mnt\mantenedores\Alumnos_asignaturas\Domain\Response\Alumnos_asignaturasResponse;
use Mnt\mantenedores\Alumnos_asignaturas\Persistence\Alumnos_asignaturasPersistence;

class Alumnos_asignaturasRepository
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

    public function obtenerCurricula($codigoAlumno){
        $alumnoAsignatura = new Alumnos_asignaturasPersistence();
        $data = $alumnoAsignatura->obtenerCurricula($codigoAlumno);

        return $data;
    }

    public function Listar()
    {
        $data = Alumnos_asignaturasPersistence::Listar();

        $rs = new Alumnos_asignaturasResponse($this->service);
        $data = $rs->ListaResponse($data);

        return  $data;
    }

    public function BuscarPorId($id)
    {
        $res = Alumnos_asignaturasPersistence::BuscarPorId($id);

        $rs = new Alumnos_asignaturasResponse($this->service);
        $data = $rs->ListaResponse($res);

        return  empty($data) ? NewError::__Log("El id no existe", 202) : $data[0];
    }

}
