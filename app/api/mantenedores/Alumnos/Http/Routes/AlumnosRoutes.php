<?php
namespace Mnt\mantenedores\Alumnos\Http\Routes;

use Mnt\mantenedores\Alumnos\Http\Controller\AlumnosController;

class AlumnosRoutes
{
    public static function Routes($router)
    {
        $ctr = new AlumnosController();
    
        $router->get('/alumnos/[i:id]', $ctr->BuscarPorId());
    }
}
