<?php
namespace Mnt\mantenedores\Asignaturas\Http\Controller;

use Mnt\mantenedores\Asignaturas\Domain\Entities\AsignaturasEntities;
use Mnt\mantenedores\Asignaturas\Domain\Repository\AsignaturasRepository;
use App\Utils\Service\NewController;

class AsignaturasController
{

    public function Listar()
    {
        $ctr = new NewController();

        return $ctr->Controller(function ($request, $response, $service, $app) {
            // validators
            $sv = new AsignaturasEntities($service);
            $sv->validateParamsLista();

            // example request
            $start = $request->param('start');
            $length = $request->param('length');
            $search = $request->param('search');
            $order = $request->param('order');

            $repo = new AsignaturasRepository();
            $data = $repo->Listar($start, $length, $search, $order);

            return  $data;
        });
    }

    public function Crear()
    {
        $ctr = new NewController();

        return $ctr->Controller(function ($request, $response, $service, $app) {
            // validators
            $sv = new AsignaturasEntities($request, $response, $service);
            $sv->validateParamsCrear();

            // example
            // $service->validateParam('param_name1', 'Please enter a valid username s')->isLen(4, 6)->isChars('a-zA-Z0-9-');
            // $service->validateParam('param_name2')->notNull();
            $body = $sv->modelRequestBody();

            $repo = new AsignaturasRepository();
            $res = $repo->Crear($body);
            
            if (isset($res[0]['id'])) {
                $res = $repo->BuscarPorId($res[0]['id']);
                return $res;
            }
            return $res;
        });
    }

    public function BuscarPorId()
    {
        $ctr = new NewController();

        return $ctr->Controller(function ($request, $response, $service, $app) {
            // example request, args
            // $service->validateParam('param_name1', 'Please enter a valid username s')->isLen(4, 6)->isChars('a-zA-Z0-9-');
            // $service->validateParam('param_name2')->notNull();
            $id = (int)$request->param('id');

            $repo = new AsignaturasRepository();
            $res = $repo->BuscarPorId($id);
        
            return $res;
        });
    }

    public function Actualizar()
    {
        $ctr = new NewController();

        return $ctr->Controller(function ($request, $response, $service, $app) {
            // validators
            $sv = new AsignaturasEntities($request, $response, $service);
            $sv->validateParamsActualizar();

            // example request, args
            $id = (int)$request->param('id');
            $body = $sv->modelRequestBody();

            $repo = new AsignaturasRepository();
            $res = $repo->Actualizar($id, $body);

            $res->data = $repo->BuscarPorId($id);
            return  $res;
        });
    }

    public function Eliminar()
    {
        $ctr = new NewController();

        return $ctr->Controller(function ($request, $response, $service) {
            // example request, args
            $id = (int)$request->param('id');

            $repo = new AsignaturasRepository();
            $res = $repo->Eliminar($id);

            return  $res;
        });
    }
}
