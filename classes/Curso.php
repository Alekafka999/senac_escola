<?php
require_once '../config/database.php';

class Curso {
    private $conn;
    private $table_name = "tb_cursos";

    public $id;
    public $nome;
    public $carga_horaria;
    public $periodo;
    public $valor;
    public $categoria;
    public $ativo;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (nome, carga_horaria, periodo, valor, categoria, ativo) VALUES (:nome, :carga_horaria, :periodo, :valor, :categoria, :ativo)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":carga_horaria", $this->carga_horaria);
        $stmt->bindParam(":periodo", $this->periodo);
        $stmt->bindParam(":valor", $this->valor);
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":ativo", $this->ativo);

        return $stmt->execute();
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY data_cadastro DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, carga_horaria = :carga_horaria, periodo = :periodo, valor = :valor, categoria = :categoria, ativo = :ativo WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":carga_horaria", $this->carga_horaria);
        $stmt->bindParam(":periodo", $this->periodo);
        $stmt->bindParam(":valor", $this->valor);
        $stmt->bindParam(":categoria", $this->categoria);
        $stmt->bindParam(":ativo", $this->ativo);
        $stmt->bindParam(":id", $this->id);

        return $stmt->execute();
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }
}
?>