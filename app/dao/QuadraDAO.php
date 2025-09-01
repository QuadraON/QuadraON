<?php

include_once(__DIR__ . "/../connection/Connection.php");

class QuadraDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Connection::getConn();
    }

    public function buscarPorUsuario($idUsuario)
    {
        $sql = "SELECT * FROM Quadra";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function inserir($nome, $tipo, $descricao, $idUsuario)
    {
        $stmt = $this->conn->prepare("INSERT INTO Quadra (nome, quadraTipo, descricao, idUsuario) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nome, $tipo, $descricao, $idUsuario]);
    }

    public function remover($idQuadra)
    {
        $stmt = $this->conn->prepare("DELETE FROM Quadra WHERE idQuadra = ?");
        return $stmt->execute([$idQuadra]);
    }

    public function buscarTodas()
    {
        $sql = "SELECT * FROM Quadra";

        $stmt = $this->conn->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
