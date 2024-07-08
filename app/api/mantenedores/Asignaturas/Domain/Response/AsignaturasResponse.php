<?php
namespace Mnt\mantenedores\Asignaturas\Domain\Response;

class AsignaturasResponse
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
        return $data;
    }

}
