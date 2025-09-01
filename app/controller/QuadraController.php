<?php

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../service/QuadraService.php");


class QuadraController extends Controller {
    
    private $quadraService;

    public function __construct()
    {

        //Verificar se o usuário está logado
        if(! $this->usuarioEstaLogado())
            return;

        $this->quadraService = new QuadraService();

        //Tratar a ação solicitada no parâmetro "action"
        $this->handleAction();
    }

    protected function create() {

        //TODO puxar os tipos de quadro do banco
        $dados["quadras"]['tipoQuadras'] = ['GRAMADO', 'SINTETICO', 'QUADRA', 'AREIA'];

        $this->loadView("quadra/quadra-create.php", $dados);
    }


    // Listar todas as quadras do usuário
    public function list()
    {
        $idUsuario = 1;
        $dados["quadras"] = $this->quadraService->listarQuadrasPorUsuario($idUsuario);

        $this->loadView("quadra/quadra-list.php", $dados);
    }

    // salvar quadra no banco
public function save()
{
    $id = $this->getIdUsuarioLogado();

    $nome = trim($_POST["nomeQuadra"] ?? '');
    $tipo = trim($_POST["tipoQuadra"] ?? '');
    $descricao = trim($_POST["descricao"] ?? '');
    //$endereco = trim($_POST["endereco"] ?? '');

    // Validação: nenhum campo pode estar vazio
    if ($nome === '' || $tipo === '' || $descricao === '') {
        $dados["erro"] = "Todos os campos são obrigatórios!";

        // Recarrega a view de criação com a mensagem de erro
        $dados["quadras"]['tipoQuadras'] = ['GRAMADO', 'SINTETICO', 'QUADRA', 'AREIA'];
        $this->loadView("quadra/quadra-create.php", $dados);
        return; // sai do método
    }

    // Se passou na validação, cria a quadra
    $this->quadraService->criarQuadra($nome, $tipo, $descricao, $id);

    // Redireciona para a lista de quadras
    $this->list();
}


    
    // Deletar uma quadra por ID
    public function deletarQuadra($idQuadra)
    {
        return $this->quadraService->deletarQuadra($idQuadra);
    }
}

  

//Criar o objeto do controller
new QuadraController();
