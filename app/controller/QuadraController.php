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
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Trata o POST: atualizar quadra
        $idQuadra = $_POST['idQuadra'] ?? null;
        $nome = trim($_POST["nomeQuadra"] ?? '');
        $tipo = trim($_POST["tipoQuadra"] ?? '');
        $descricao = trim($_POST["descricao"] ?? '');
        $endereco = trim($_POST["endereco"] ?? '');

        // Upload da foto (opcional)
        $foto = null;
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
            $nomeArquivo = uniqid() . '_' . basename($_FILES['foto']['name']);
            $caminhoDestino = __DIR__ . '/../../uploads/' . $nomeArquivo;
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminhoDestino)) {
                $foto = 'uploads/' . $nomeArquivo;
            }
        }

        // Atualiza a quadra (você precisa implementar esse método na Service e DAO)
        $this->quadraService->atualizarQuadra($idQuadra, $nome, $tipo, $descricao, $endereco, $foto);

        // Redireciona para a lista
        $this->list();
        return;
    }

    // GET: carrega a tela de edição
    $idQuadra = $_GET['id'] ?? null;
    if ($idQuadra) {
        $quadra = $this->quadraService->buscarQuadraPorId($idQuadra);

        $campos = ['idQuadra', 'nome', 'quadraTipo', 'descricao', 'endereco', 'foto'];
        foreach ($campos as $campo) {
            if (!isset($quadra[$campo])) {
                $quadra[$campo] = '';
            }
        }

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
    $endereco = trim($_POST["endereco"] ?? '');

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
    if ($nome === '' || $tipo === '' || $descricao === ''
        || $endereco === '') {
        $dados["erro"] = "Todos os campos são obrigatórios!";

        // Recarrega a view de criação com a mensagem de erro
        $dados["quadras"]['tipoQuadras'] = ['GRAMADO', 'SINTETICO', 'QUADRA', 'AREIA'];
        $this->loadView("quadra/quadra-create.php", $dados);
        return; // sai do método
    }

    // Se passou na validação, cria a quadra
    $this->quadraService->criarQuadra($nome, $tipo, $descricao, $id, $foto , $endereco);

    // Redireciona para a lista de quadras
    $this->list();
}


    
    // Deletar uma quadra por ID
    public function deletarQuadra($idQuadra)
    {
        return $this->quadraService->deletarQuadra($idQuadra);
    }


    //////////////////////////////////////
    
public function alugar()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $idQuadra = $_POST['idQuadra'] ?? null;
        $data = $_POST['data'] ?? null;
        $horaInicio = $_POST['horaInicio'] ?? null;
        $horaFim = $_POST['horaFim'] ?? null;
        $idUsuario = $this->getIdUsuarioLogado(); // ou $_SESSION['idUsuario']

        // Só salva se todos os campos estiverem preenchidos
        if ($idQuadra && $idUsuario && $data && $horaInicio && $horaFim) {
            $resultado = $this->quadraService->alugarQuadra($idQuadra, $idUsuario, $data, $horaInicio, $horaFim);
            if ($resultado) {
                // Sucesso: redireciona para a lista
                header('Location: /QuadraON/app/controller/QuadraController.php?action=list');
                exit;
            } else {
                // Erro: recarrega o formulário com mensagem de erro
                $dados['erro'] = "Erro ao salvar a reserva. Tente novamente.";
                $quadra = $this->quadraService->buscarQuadraPorId($idQuadra);
                $dados['quadra'] = $quadra;
                $this->loadView("quadra/alugar-form.php", $dados);
                return;
            }
        } else {
            // Campos faltando
            $dados['erro'] = "Todos os campos são obrigatórios.";
            $quadra = $this->quadraService->buscarQuadraPorId($idQuadra);
            $dados['quadra'] = $quadra;
            $this->loadView("quadra/alugar-form.php", $dados);
            return;
        }

    }

    // GET: carrega o formulário
    $idQuadra = $_GET['id'] ?? null;
    if (!$idQuadra) {
        $this->list();
        return;
    }
    $quadra = $this->quadraService->buscarQuadraPorId($idQuadra);
    if (!$quadra) {
        $this->list();
        return;
    }
    $dados['quadra'] = $quadra;
    $this->loadView("quadra/alugar-form.php", $dados);
}
}

  

//Criar o objeto do controller
new QuadraController();
