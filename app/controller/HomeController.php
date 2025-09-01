<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../dao/QuadraDAO.php");


class HomeController extends Controller {

    private UsuarioDAO $usuarioDAO;
    private QuadraDAO $quadraDAO;


    public function __construct() {
        //Verificar se o usuário está logado
        if(! $this->usuarioEstaLogado())
            return;

        $this->usuarioDAO = new UsuarioDAO();
        $this->quadraDAO = new QuadraDAO();

        //Tratar a ação solicitada no parâmetro "action"
        $this->handleAction();
    }

    protected function home() {

        $dados["qtdUsuarios"] = $this->usuarioDAO->quantidadeUsuarios(); 

        $dados["quadras"] = $this->quadraDAO->buscarTodas();

        $this->loadView("home/home.php", $dados);
    }

    public function outraPagina(){


        $dados["info1"] = "primeira informacao";
        $dados["info2"] = "segunda informacao";
        $dados["quadras"] = $this->quadraDAO->buscarTodas();

        $this->loadView("home/outra_pagina.php", $dados);
    }
    
}

//Criar o objeto do controller
// Toda vez que o comando new é executado, é chamdo o __construct
new HomeController();