<?php

require_once(__DIR__ . "/Controller.php");

class CadastroController extends Controller {

    //Método construtor do controller - será executado a cada requisição a está classe
    public function __construct() {
        $this->handleAction();
    }

    protected function cadastrar() {
        echo "Chamou!";
    }


    protected function salvar() {
        echo "Chamou!";
    }

}

new CadastroController();