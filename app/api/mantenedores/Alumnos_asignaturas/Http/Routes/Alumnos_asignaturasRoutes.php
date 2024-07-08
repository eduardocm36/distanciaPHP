<?php
namespace Mnt\mantenedores\Alumnos_asignaturas\Http\Routes;

use Mnt\mantenedores\Alumnos_asignaturas\Http\Controller\Alumnos_asignaturasController;

class Alumnos_asignaturasRoutes
{
    public static function Routes($router)
    {
        $ctr = new Alumnos_asignaturasController();
    
        // Rutas
        //$router->get('/alumnos_asignaturas', $ctr->Listar());
        //$router->get('/alumnos_asignaturas/[i:id]', $ctr->BuscarPorId());
    }
}
