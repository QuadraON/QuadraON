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

    public function buscarPorId($idQuadra)
{
    $stmt = $this->conn->prepare("SELECT * FROM Quadra WHERE idQuadra = ?");
    $stmt->execute([$idQuadra]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    public function inserir($nome, $tipo, $descricao, $idUsuario, $foto)
    {
        $stmt = $this->conn->prepare("INSERT INTO Quadra (nome, quadraTipo, descricao, idUsuario, foto) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$nome, $tipo, $descricao, $idUsuario, $foto]);
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
