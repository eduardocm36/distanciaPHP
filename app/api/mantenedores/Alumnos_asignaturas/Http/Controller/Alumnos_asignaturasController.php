<?php
namespace Mnt\mantenedores\Alumnos_asignaturas\Http\Controller;

use Mnt\mantenedores\Alumnos_asignaturas\Domain\Entities\Alumnos_asignaturasEntities;
use Mnt\mantenedores\Alumnos_asignaturas\Domain\Repository\Alumnos_asignaturasRepository;
use App\Utils\Service\NewController;

class Alumnos_asignaturasController
{

    public function Listar()
    {
        $ctr = new NewController();

        return $ctr->Controller(function () {
            // validators
            $sv = new Alumnos_asignaturasEntities();
            $sv->validateParamsLista();

            $repo = new Alumnos_asignaturasRepository();
            $data = $repo->Listar();

            return  $data;
        });
    }


    public function BuscarPorId()
    {
        $ctr = new NewController();

        return $ctr->Controller(function ($request, $response, $service, $app) {
            $id = (int)$request->param('id');

            $repo = new Alumnos_asignaturasRepository();
            $res = $repo->BuscarPorId($id);
        
            return $res;
        });
    }



}
