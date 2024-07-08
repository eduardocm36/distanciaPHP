<?php
namespace Mnt\mantenedores\Alumnos_asignaturas;

use Mnt\mantenedores\Alumnos_asignaturas\Http\Routes\Alumnos_asignaturasRoutes;

class Alumnos_asignaturasMnt
{
    public static function Create($app)
    {
        Alumnos_asignaturasRoutes::Routes($app);
    }
}
