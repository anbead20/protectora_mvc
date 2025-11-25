<?php

namespace App\Models;

class AnimalModel extends DAbstractModel
{
    private $id;
    private $nombre;
    private $raza;
    private $fechaNacimiento;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getRaza()
    {
        return $this->raza;
    }

    public function setRaza($raza)
    {
        $this->raza = $raza;
    }

    public function getFecha()
    {
        return $this->fechaNacimiento;
    }

    public function setFecha($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function get($id = '')
    {
        try {
            $this->query = "SELECT * FROM mascotas" . ($id ? " WHERE id = :id" : "");
            $this->params = $id ? [':id' => $id] : [];
            $this->get_results_from_query(); // <<--- Esto llena $this->rows
            return $this->rows;
        } catch (\PDOException $th) {
            $this->error = true;
            $this->message = $th->getMessage();
            throw $th;
        }
    }

    public function set()
    {
        try {
            $this->query = "INSERT INTO mascotas (nombre, raza, fechaNacimiento) VALUES (:nombre, :raza, :fechaNacimiento)";
            $this->params = [
                ':nombre' => $this->nombre,
                ':raza'   => $this->raza,
                ':fechaNacimiento'  => $this->fechaNacimiento ?: date('Y-m-d') // Si no se ha definido fecha, se asigna la fecha actual
            ];

            $this->execute_single_query();

            // Guardamos el ID recién insertado
            $this->id = $this->getConnection()->lastInsertId();

            return $this->id; // Devuelve el ID insertado
        } catch (\PDOException $th) {
            $this->error = true;
            $this->message = $th->getMessage();
            throw $th;
        }
    }

    public function edit()
    {
        try {
            if (empty($this->id)) {
                throw new \Exception("Se requiere un ID para modificar el registro");
            }

            // Si no se ha definido fecha, se asigna la fecha actual
            if (empty($this->fechaNacimiento)) {
                $this->fechaNacimiento = date('Y-m-d');
            }

            $this->query = "UPDATE mascotas SET nombre = :nombre, raza = :raza, fechaNacimiento = :fechaNacimiento WHERE id = :id";
            $this->params = [
                ':nombre' => $this->nombre,
                ':raza'   => $this->raza,
                ':fechaNacimiento'  => $this->fechaNacimiento,
                ':id'     => $this->id
            ];

            $this->execute_single_query();

            return $this->affected_rows; // Devuelve el número de filas afectadas
        } catch (\PDOException $th) {
            $this->error = true;
            $this->message = $th->getMessage();
            throw $th;
        }
    }

    public function delete($id = '')
    {
        try {
            $deleteId = $id ?: $this->id; // Permite pasar el ID o usar $this->id

            if (empty($deleteId)) {
                throw new \Exception("Se requiere un ID para eliminar el registro");
            }

            $this->query = "DELETE FROM mascotas WHERE id = :id";
            $this->params = [':id' => $deleteId];

            $this->execute_single_query();

            return $this->affected_rows; // Devuelve el número de filas eliminadas
        } catch (\PDOException $th) {
            $this->error = true;
            $this->message = $th->getMessage();
            throw $th;
        }
    }
    public function getAll()
    {
        try {
            $this->query = "
                SELECT id, nombre, raza, fechaNacimiento
                FROM mascotas
            ";
            $this->get_results_from_query();
            return $this->rows;
        } catch (\Exception $e) {
            $this->message = 'Error al obtener animales: ' . $e->getMessage();
            return [];
        }
    }
}
