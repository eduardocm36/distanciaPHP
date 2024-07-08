<?php
namespace Mnt\mantenedores\Alumnos;

use Mnt\mantenedores\Alumnos\Http\Routes\AlumnosRoutes;

class AlumnosMnt
{
    public static function Create($app)
    {
        AlumnosRoutes::Routes($app);
    }
}
