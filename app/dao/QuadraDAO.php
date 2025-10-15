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
        $sql = "SELECT * FROM Quadra WHERE idUsuario = :idUsuario";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($idQuadra)
    {
        $stmt = $this->conn->prepare("SELECT * FROM Quadra WHERE idQuadra = ?");
        $stmt->execute([$idQuadra]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inserir($nome, $tipo, $descricao, $idUsuario, $foto , $endereco)
    {
        $stmt = $this->conn->prepare("INSERT INTO Quadra (nome, quadraTipo, descricao, idUsuario, foto, endereco) VALUES (?, ?, ?, ?, ?, ?)");
        return $stmt->execute([$nome, $tipo, $descricao, $idUsuario, $foto , $endereco]);
    }

    public function removerReservasPorQuadra($idQuadra)
    {
        $stmt = $this->conn->prepare("DELETE FROM Reserva WHERE idQuadra = ?");
        return $stmt->execute([$idQuadra]);
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

    public function atualizar($idQuadra, $nome, $tipo, $descricao, $endereco, $foto)
    {
        if ($foto) {
            $stmt = $this->conn->prepare("UPDATE Quadra SET nome=?, quadraTipo=?, descricao=?, endereco=?, foto=? WHERE idQuadra=?");
            return $stmt->execute([$nome, $tipo, $descricao, $endereco, $foto, $idQuadra]);
        } else {
            $stmt = $this->conn->prepare("UPDATE Quadra SET nome=?, quadraTipo=?, descricao=?, endereco=? WHERE idQuadra=?");
            return $stmt->execute([$nome, $tipo, $descricao, $endereco, $idQuadra]);
        }
    }

    public function criarReserva($idQuadra, $idUsuario, $data, $horaInicio, $horaFim)
    {
        $stmt = $this->conn->prepare("INSERT INTO Reserva (idQuadra, idUsuario, data, horaInicio, horaFim) VALUES ( ?, ?, ?, ?, ?)");
        return $stmt->execute([ $idQuadra, $idUsuario, $data, $horaInicio, $horaFim]);
    }

    public function buscarReservasPorQuadra($idQuadra)
    {
        $stmt = $this->conn->prepare("SELECT * FROM Reserva WHERE idQuadra = ? ORDER BY data, horaInicio");
        $stmt->execute([$idQuadra]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Verifica se existe reserva conflitante para a quadra, data e intervalo de horário fornecidos.
     * Retorna true se houver conflito, false caso contrário.
     */
    public function existeReservaConflitante($idQuadra, $data, $horaInicio, $horaFim)
    {
        $sql = "SELECT COUNT(*) FROM Reserva 
                WHERE idQuadra = ? 
                AND data = ? 
                AND (
                    (horaInicio < ? AND horaFim > ?) OR
                    (horaInicio >= ? AND horaInicio < ?)
                )";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$idQuadra, $data, $horaFim, $horaInicio, $horaInicio, $horaFim]);
        $count = $stmt->fetchColumn();

        return $count > 0;
    }
}
