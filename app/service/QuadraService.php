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
    public function criarQuadra($nome, $tipo, $descricao, $idUsuario, $foto)
    {
        return $this->quadraDAO->inserir($nome, $tipo, $descricao, $idUsuario, $foto);
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
}
