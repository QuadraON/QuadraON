<?php
require_once(__DIR__ . '/Controller.php');
require_once(__DIR__ . '/../model/Usuario.php');
require_once(__DIR__ . '/../service/UsuarioService.php');
require_once(__DIR__ . '/../dao/UsuarioDAO.php'); // ✅ Adicionado para carregar o DAO

class CadastroController extends Controller {

    private UsuarioService $usuarioService;
    private UsuarioDAO $usuarioDao; // ✅ Declarado o atributo

    // Método construtor do controller – chamado automaticamente
    public function __construct()
    {
        $this->usuarioService = new UsuarioService();
        $this->usuarioDao = new UsuarioDAO(); // ✅ Instanciado o DAO

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
        $confSenha = $_POST['senha'] ?? '';
        $endereco = $_POST['endereco'] ?? '';
        $telefone = $_POST['telefone'] ?? '';
        $tipousuario = $_POST['tipousuario'] ?? '';
    
        // Carrega o modelo de usuário
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);  // seta a senha em texto puro para validação
  
        $usuario->setTelefone($telefone);
        $usuario->setEndereco($endereco);
        $usuario->setTipoUsuario($tipousuario);  // faltava setar esse campo

        // Validar os dados (camada service)
        $erros = $this->usuarioService->validarDados($usuario, $confSenha);
            
        if (!$erros) {
            // Se validou, agora sim gerar hash da senha
            $usuario->setSenha(password_hash($senha, PASSWORD_DEFAULT));
    
            // Inserir no banco de dados
            try {
                $this->usuarioDao->insert($usuario);

                header("location: " . BASEURL . "/controller/LoginController.php?action=login");
                exit;
            } catch (PDOException $e) {
                array_push($erros, "Erro ao gravar no banco de dados!");
            }
        }
    
        // Se houve erros, provavelmente você vai querer mostrar os erros na view
        // Exemplo:
        $msgErro = implode("<br>", $erros);
        $dados['papeis'] = UsuarioTipo::getSemAdminAsArray();
        $dados['usuario'] = $usuario;
        $this->loadView("usuario/cadastro.php", $dados, $msgErro);
    }
    

}

new CadastroController();
