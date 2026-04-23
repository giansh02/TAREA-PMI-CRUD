<?php
require_once __DIR__ . '/../conexion/Conexion.php';

class Usuario {
    private $conn;
    private $table = 'usuario';

    public function __construct() {
        $db = new Conexion();
        $this->conn = $db->conectar();
    }

    public function listar() {
        $sql  = "SELECT * FROM {$this->table} ORDER BY id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener($id) {
        $sql  = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insertar($nombre, $clave, $estado) {
        $sql  = "INSERT INTO {$this->table} (nombre, clave, estado)
                 VALUES (:nombre, :clave, :estado)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':nombre' => $nombre,
            ':clave'  => md5($clave),
            ':estado' => $estado
        ]);
    }

    public function actualizar($id, $nombre, $clave, $estado) {
        if (!empty($clave)) {
            $sql  = "UPDATE {$this->table}
                     SET nombre = :nombre, clave = :clave, estado = :estado
                     WHERE id = :id";
            $params = [
                ':id'     => $id,
                ':nombre' => $nombre,
                ':clave'  => md5($clave),
                ':estado' => $estado
            ];
        } else {
            $sql  = "UPDATE {$this->table}
                     SET nombre = :nombre, estado = :estado
                     WHERE id = :id";
            $params = [
                ':id'     => $id,
                ':nombre' => $nombre,
                ':estado' => $estado
            ];
        }
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }

    public function eliminar($id) {
        $sql  = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
