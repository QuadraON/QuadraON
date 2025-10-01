<?php

require_once(__DIR__ . "/../dao/QuadraDAO.php");

class QuadraService
{
    private $quadraDAO;

    public function __construct()
    {
        $this->quadraDAO = new QuadraDAO();
    }

    public function listarQuadrasPorUsuario($idUsuario)
    {
        return $this->quadraDAO->buscarPorUsuario($idUsuario);
    }

    // TODO: É necessário incluir o nome da quadra
    public function criarQuadra($nome, $tipo, $descricao, $idUsuario, $foto , $endereco)
    {
        return $this->quadraDAO->inserir($nome, $tipo, $descricao, $idUsuario, $foto, $endereco);
    }

    
        public function buscarQuadraPorId($idQuadra)
    {
    return $this->quadraDAO->buscarPorId($idQuadra);
    }


    public function deletarQuadra($idQuadra)
    {
        return $this->quadraDAO->remover($idQuadra);
    }
    public function buscarTodas()
    {
        return $this->quadraDAO->buscarTodas();
    }

    public function atualizarQuadra(  $idQuadra, $nome, $tipo, $descricao, $endereco, $foto)
{
    return $this->quadraDAO->atualizar( $idQuadra, $nome, $tipo, $descricao, $endereco, $foto);
}
//////////////
public function alugarQuadra( $idQuadra, $idUsuario, $data, $horaInicio, $horaFim)
{
    return $this->quadraDAO->criarReserva( $idQuadra, $idUsuario, $data, $horaInicio, $horaFim);
}

public function buscarReservasPorQuadra($idQuadra)
{
    return $this->quadraDAO->buscarReservasPorQuadra($idQuadra);
}

public function existeReservaConflitante($idQuadra, $data, $horaInicio, $horaFim)
{
    return $this->quadraDAO->existeReservaConflitante($idQuadra, $data, $horaInicio, $horaFim);
}
}
