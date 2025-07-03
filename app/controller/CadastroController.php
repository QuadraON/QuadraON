<?php
require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . '/../model/Usuario.php');

class CadastroController extends Controller
{
    // Método construtor do controller – chamado automaticamente
    public function __construct()
    {
        $this->handleAction(); // Essa função provavelmente está na classe pai "Controller"
    }

    // Mostra o formulário de cadastro
    protected function cadastrar()
    {
        $dados['papeis'] = UsuarioTipo::getSemAdminAsArray();
        
        //Loadview
        $this->loadView("usuario/cadastro.php", $dados);



    }

    // Salva os dados do usuário
    protected function salvar()
    {
        // Recebe dados do formulário
        $nome = $_POST['nome'] ?? '';
        $email = $_POST['email'] ?? '';
        $senha = $_POST['senha'] ?? '';
        $telefone = $_POST['telefone'] ?? '';
        $endereco = $_POST['endereco'] ?? '';
        $tipousuario = $_POST['tipousuario'] ?? '';
        

        // Carrega o modelo de usuário
        
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha(password_hash($senha, PASSWORD_DEFAULT)); // Segurança com hash
        $usuario->setTelefone($telefone);
        $usuario->setEndereco($endereco);

        // Salva no banco de dados
        if ($usuario->salvar()) {

            echo "Usuário cadastrado com sucesso!";
            // Redirecionar ou carregar outra view, se quiser
            // header('Location: LoginController.php?action=login');
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    }
}

new CadastroController();
