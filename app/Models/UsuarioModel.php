<?php

namespace App\Models;

class UsuarioModel extends DAbstractModel
{
    private $id;
    private $username;
    private $email;
    private $telefono;
    private $password;
    private $nombre;
    private $apellido;
    private $direccion;
    private $rol;
    private $created_at;
    private $update_at;
    private $ultimo_login;

    // Getters y Setters
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function getTipo()
    {
        return $this->rol;
    }
    public function setTipo($rol)
    {
        $this->rol = $rol;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    public function getUpdateAt()
    {
        return $this->update_at;
    }
    public function setUpdateAt($update_at)
    {
        $this->update_at = $update_at;
    }

    public function getUltimoLogin()
    {
        return $this->ultimo_login;
    }
    public function setUltimoLogin($ultimo_login)
    {
        $this->ultimo_login = $ultimo_login;
    }

    // CRUD
    public function get($id = '')
    {
        try {
            $this->query = "SELECT * FROM usuarios" . ($id ? " WHERE id = :id" : "");
            $this->params = $id ? [':id' => $id] : [];
            $this->get_results_from_query();
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
            $this->query = "
                INSERT INTO usuarios (
                    username, email, telefono, password, nombre, apellido, direccion, rol, created_at, update_at, ultimo_login
                ) VALUES (
                    :username, :email, :telefono, :password, :nombre, :apellido, :direccion, :rol, CURRENT_TIMESTAMP, :update_at, :ultimo_login
                )
            ";
            $this->params = [
                ':username' => $this->username,
                ':email' => $this->email,
                ':telefono' => $this->telefono,
                ':password' => $this->password,
                ':nombre' => $this->nombre,
                ':apellido' => $this->apellido,
                ':direccion' => $this->direccion,
                ':rol' => $this->rol ?: 'empleado',
                ':update_at' => $this->update_at ?: '0000-00-00',
                ':ultimo_login' => $this->ultimo_login ?: null
            ];

            $this->execute_single_query();
            $this->id = $this->getConnection()->lastInsertId();
            return $this->id;
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
                throw new \Exception("Se requiere un ID para modificar el usuario");
            }

            $this->query = "
                UPDATE usuarios SET
                    username = :username,
                    email = :email,
                    telefono = :telefono,
                    password = :password,
                    nombre = :nombre,
                    apellido = :apellido,
                    direccion = :direccion,
                    rol = :rol,
                    update_at = :update_at,
                    ultimo_login = :ultimo_login
                WHERE id = :id
            ";
            $this->params = [
                ':username' => $this->username,
                ':email' => $this->email,
                ':telefono' => $this->telefono,
                ':password' => $this->password,
                ':nombre' => $this->nombre,
                ':apellido' => $this->apellido,
                ':direccion' => $this->direccion,
                ':rol' => $this->rol,
                ':update_at' => $this->update_at ?: date('Y-m-d'),
                ':ultimo_login' => $this->ultimo_login,
                ':id' => $this->id
            ];

            $this->execute_single_query();
            return $this->affected_rows;
        } catch (\PDOException $th) {
            $this->error = true;
            $this->message = $th->getMessage();
            throw $th;
        }
    }

    public function delete($id = '')
    {
        try {
            $deleteId = $id ?: $this->id;
            if (empty($deleteId)) {
                throw new \Exception("Se requiere un ID para eliminar el usuario");
            }

            $this->query = "DELETE FROM usuarios WHERE id = :id";
            $this->params = [':id' => $deleteId];
            $this->execute_single_query();
            return $this->affected_rows;
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
                SELECT id, username, email, telefono, nombre, apellido, rol, created_at, ultimo_login
                FROM usuarios
                ORDER BY created_at DESC
            ";
            $this->get_results_from_query();
            return $this->rows;
        } catch (\Exception $e) {
            $this->message = 'Error al obtener usuarios: ' . $e->getMessage();
            return [];
        }
    }

    public function insert(array $data)
    {
        $this->setUsername($data['username']);
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setTelefono($data['telefono'] ?? '');
        $this->setNombre($data['nombre'] ?? '');
        $this->setApellido($data['apellido'] ?? '');
        $this->setDireccion($data['direccion'] ?? '');
        $this->setTipo('usuario');

        return $this->set();
    }
}
