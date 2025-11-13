<?php

namespace App\Models;

class AnimalModel extends DAbstractModel
{
    private $id;
    private $nombre;
    private $raza;
    private $fecha;

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
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    protected function get($id = '')
    {
        try {
            $this->query = "SELECT * FROM animales" . ($id ? " WHERE id = :id" : "");
            $this->params = $id ? [':id' => $id] : [];
            $this->execute_single_query();
            return $this->rows;
        } catch (\PDOException $th) {
            $this->error = true;
            $this->message = $th->getMessage();
            throw $th;
        }
    }

    protected function set()
    {
        try {
            $this->query = "INSERT INTO animales (nombre, raza, fecha) VALUES (:nombre, :raza, :fecha)";
            $this->params = [
                ':nombre' => $this->nombre,
                ':raza' => $this->raza,
                ':fecha' => $this->fecha
            ];
            $this->execute_single_query();
        } catch (\PDOException $th) {
            $this->error = true;
            $this->message = $th->getMessage();
            throw $th;
        }
    }

    protected function delete($id = '')
    {
        try {
            $this->query = "DELETE FROM animales WHERE id = :id";
            $this->params = [':id' => $id];
            $this->execute_single_query();
        } catch (\PDOException $th) {
            $this->error = true;
            $this->message = $th->getMessage();
            throw $th;
        }
    }

    protected function edit()
    {
        try {
            $this->query = "UPDATE animales SET nombre = :nombre, raza = :raza, fecha = :fecha WHERE id = :id";
            $this->params = [
                ':nombre' => $this->nombre,
                ':raza' => $this->raza,
                ':fecha' => $this->fecha,
                ':id' => $this->id
            ];
            $this->execute_single_query();
        } catch (\PDOException $th) {
            $this->error = true;
            $this->message = $th->getMessage();
            throw $th;
        }
    }
}
