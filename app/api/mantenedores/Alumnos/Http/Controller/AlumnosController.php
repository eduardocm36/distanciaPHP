<?php
namespace Mnt\mantenedores\Alumnos\Http\Controller;

use Mnt\mantenedores\Alumnos\Domain\Entities\AlumnosEntities;
use Mnt\mantenedores\Alumnos\Domain\Repository\AlumnosRepository;
use App\Utils\Service\NewController;

class AlumnosController
{

    public function BuscarPorId()
    {
        $ctr = new NewController();

        return $ctr->Controller(function ($request, $response, $service, $app) {
            $id = (int)$request->param('id');

            $repo = new AlumnosRepository();
            $res = $repo->BuscarPorId($id);
        
            return $res;
        });
    }
}
