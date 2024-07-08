<?php
namespace Mnt\mantenedores\Asignaturas\Http\Routes;

use Mnt\mantenedores\Asignaturas\Http\Controller\AsignaturasController;

class AsignaturasRoutes
{
    public static function Routes($router)
    {
        $ctr = new AsignaturasController();
    
        // Rutas
        //$router->get('/asignaturas', $ctr->Listar());
        //$router->post('/asignaturas', $ctr->Crear());
        //$router->get('/asignaturas/[i:id]', $ctr->BuscarPorId());
        //$router->put('/asignaturas/[i:id]', $ctr->Actualizar());
        //$router->delete('/asignaturas/[i:id]', $ctr->Eliminar());
    }
}
