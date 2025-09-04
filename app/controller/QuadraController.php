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

    // crud de quadras
    public function crudquadra()
    {
        $idUsuario = 1;
        $dados["lista"] = $this->quadraService->listarQuadrasPorUsuario($idUsuario);

        $this->loadView("quadra/crud_quadra.php", $dados);
    }

    // Editar quadra
public function edit()
{
    $idQuadra = $_GET['id'] ?? null;
    if ($idQuadra) {
        $quadra = $this->quadraService->buscarQuadraPorId($idQuadra);
        $dados['quadra'] = $quadra;
        $dados["quadras"]['tipoQuadras'] = ['GRAMADO', 'SINTETICO', 'QUADRA', 'AREIA'];
        $this->loadView("quadra/quadra-edit.php", $dados);
    } else {
        $this->list();
    }
}

// Excluir quadra
public function delete()
{
    $idQuadra = $_GET['id'] ?? null;
    if ($idQuadra) {
        $this->quadraService->deletarQuadra($idQuadra);
    }
    $this->list();
}

    // salvar quadra no banco
public function save()
{
    $id = $this->getIdUsuarioLogado();

    $nome = trim($_POST["nomeQuadra"] ?? '');
    $tipo = trim($_POST["tipoQuadra"] ?? '');
    $descricao = trim($_POST["descricao"] ?? '');
    //$endereco = trim($_POST["endereco"] ?? '');

     // --- NOVO: Tratamento do upload de foto ---
    $foto = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $nomeArquivo = uniqid() . '_' . basename($_FILES['foto']['name']);
        $caminhoDestino = __DIR__ . '/../../uploads/' . $nomeArquivo;
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoDestino)) {
            $foto = 'uploads/' . $nomeArquivo;
        }
    }
    // ------------------------------------------

    // Validação: nenhum campo pode estar vazio
    if ($nome === '' || $tipo === '' || $descricao === '') {
        $dados["erro"] = "Todos os campos são obrigatórios!";

        // Recarrega a view de criação com a mensagem de erro
        $dados["quadras"]['tipoQuadras'] = ['GRAMADO', 'SINTETICO', 'QUADRA', 'AREIA'];
        $this->loadView("quadra/quadra-create.php", $dados);
        return; // sai do método
    }

    // Se passou na validação, cria a quadra
    $this->quadraService->criarQuadra($nome, $tipo, $descricao, $id, $foto);

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
