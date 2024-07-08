<?php
namespace Mnt\mantenedores\Asignaturas\Domain\Repository;

use App\Utils\Utils;
use App\Utils\Service\NewError;
use Mnt\mantenedores\Asignaturas\Domain\Response\AsignaturasResponse;
use Mnt\mantenedores\Asignaturas\Persistence\AsignaturasPersistence;

class AsignaturasRepository
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

    public function Listar($start, $length, $search, $order)
    {
        $data = AsignaturasPersistence::Listar($start, $length, $search, $order);

        $rs = new AsignaturasResponse($this->service);
        $data = $rs->ListaResponse($data);

        return  $data;
    }

    public function Crear($body)
    {
        // validators
        $res = AsignaturasPersistence::Crear($body);

        //$rs = new AsignaturasResponse($this->service);
        
        return $res;
    }

    public function BuscarPorId($id)
    {
        $res = AsignaturasPersistence::BuscarPorId($id);

        $rs = new AsignaturasResponse($this->service);
        $data = $rs->ListaResponse($res);

        return  empty($data) ? NewError::__Log("El id no existe", 202) : $data[0];
    }

    public function Actualizar($id, $body)
    {
        // validators
        $data = AsignaturasPersistence::Actualizar($id, $body);
        
        //$rs = new AsignaturasResponse($this->service);
        $res = Utils::responseParamsUpdate($data, $id);
        return  $res;
    }

    public function Eliminar($id)
    {
        $res = AsignaturasPersistence::Eliminar($id);

        return  $res;
    }

}
