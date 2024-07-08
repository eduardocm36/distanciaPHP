<?php
namespace Mnt\mantenedores\Alumnos\Persistence;

use App\Utils\Service\NewSql;
use PDO;

class AlumnosPersistence
{

    public static function BuscarPorId($id)
    {
        // Ejemplo de uso
        $sql = new NewSql();
        return $sql->Exec(function ($con) use ($id) {

            $query = "SELECT id, codigo, nombres, espe, esp_nomb FROM alumnos 
            INNER JOIN especialidades_distancia ON alumnos.espe = especialidades_distancia.esp_codi
            WHERE codigo=:id";
            $stmt = $con->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        });
    }

}
