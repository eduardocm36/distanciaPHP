<?php
namespace Mnt\mantenedores\Alumnos_asignaturas\Persistence;

use App\Utils\Service\NewSql;
use PDO;

class Alumnos_asignaturasPersistence
{

    public function obtenerCurricula($codigoAlumno) {
        $sql = new NewSql();

        return $sql->Exec(function ($con) use ($codigoAlumno) {
            $table = 'conceptos';
            $columns = 'id,id_empresa,nombre,..';

            $stmt = $con->prepare("CALL GetUniformCurricula(:alumno, @curricula)");
            $stmt->bindParam(":alumno", $codigoAlumno, PDO::PARAM_STR);
            $stmt->execute();

            // Obtener el valor del parámetro de salida
            $result = $con->query("SELECT @curricula")->fetch(PDO::FETCH_ASSOC);

            // Devolver el valor de @curricula
            return empty($result['@curricula']) ? null : $result['@curricula'];
        });
    }

    public static function Listar()
    {
        // Ejemplo de uso
        $sql = new NewSql();
        return $sql->Exec(function ($con) {
            $query = "SELECT * FROM alumnos_asignaturas";
            $stmt = $con->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        });
    }

    public static function BuscarPorId($id)
    {
        // Ejemplo de uso
        $sql = new NewSql();
        return $sql->Exec(function ($con) use ($id) {

            $query = "SELECT * FROM alumnos_asignaturas WHERE alu_codi=:id";
            $stmt = $con->prepare($query);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        });
    }

}
