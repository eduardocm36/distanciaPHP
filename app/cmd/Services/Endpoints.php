<?php

namespace Cmd\Services;

use Throwable;
use Mnt\mantenedores\Alumnos\AlumnosMnt;
use Mnt\mantenedores\Alumnos_asignaturas\Alumnos_asignaturasMnt;
// use Mnt\mantenedores\Escuelas_distancia\Escuelas_distanciaMnt;
use Mnt\mantenedores\Asignaturas\AsignaturasMnt;
// use Mnt\mantenedores\Especialidades_distancia\Especialidades_distanciaMnt;

class Endpoints
{
    /**
     * @endpoints...
     * @param Throwable
     * validar si hay referencia de classname y no hay archivo
     * */
    public static function initEndpoints($router)
    {
        AlumnosMnt::Create($router);
        Alumnos_asignaturasMnt::Create($router);
        AsignaturasMnt::Create($router);
    }
}
