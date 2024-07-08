<?php
namespace Mnt\mantenedores\Asignaturas;

use Mnt\mantenedores\Asignaturas\Http\Routes\AsignaturasRoutes;

class AsignaturasMnt
{
    public static function Create($app)
    {
        AsignaturasRoutes::Routes($app);
    }
}
