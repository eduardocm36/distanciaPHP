<?php

namespace DB\Conexion;

use PDO;
use PDOException;
use Throwable;
use Exception;

class Conexion
{
    public static function conectar()
    {
        $sgbd_track = "mysql:host=" . DISTANCE_HOST . ";dbname=" . DISTANCE_DB_NAME;
        $link = new PDO($sgbd_track, DISTANCE_DB_USER, DISTANCE_DB_PASS, [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
        $link->exec("set names utf8");

        return $link;
    }

    public static function validar()
    {

        Conexion::conectar();

        return  null;
    }


    public static function close(PDO $link)
    {
        $link = null;
    }
}
