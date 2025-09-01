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
    public function criarQuadra($nome, $tipo, $descricao, $idUsuario)
    {
        return $this->quadraDAO->inserir($nome, $tipo, $descricao, $idUsuario);
    }

    public function deletarQuadra($idQuadra)
    {
        return $this->quadraDAO->remover($idQuadra);
    }
    public function buscarTodas()
    {
        return $this->quadraDAO->buscarTodas();
    }
}
