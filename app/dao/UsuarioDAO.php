<?php
#Nome do arquivo: UsuarioDAO.php
#Objetivo: classe DAO para o model de Usuario

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Usuario.php");

class UsuarioDAO {

    //Método para listar os usuaários a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM usuario u ORDER BY u.nome_usuario";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapUsuario($result);
    }

    //Método para buscar um usuário por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM usuario u" .
               " WHERE u.id_usuario = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $usuarios = $this->mapUsuario($result);

        if(count($usuarios) == 1)
            return $usuarios[0];
        elseif(count($usuarios) == 0)
            return null;

        die("UsuarioDAO.findById()" . 
            " - Erro: mais de um usuário encontrado.");
    }


    //Método para buscar um usuário por seu login e senha
    public function findByEmailSenha(string $email, string $senha) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM usuario u" .
               " WHERE BINARY u.email = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$email]);
        $result = $stm->fetchAll();

        $usuario = $this->mapUsuario($result);

        if(count($usuario) == 1) {
            //Tratamento para senha criptografada
            if(password_verify($senha, $usuario[0]->getSenha()))
                return $usuario[0];
            else
                return null;
        } elseif(count($usuario) == 0)
            return null;

        die("UsuarioDAO.findByLoginSenha()" . 
            " - Erro: mais de um usuário encontrado.");
    }

    //Método para inserir um Usuario
    public function insert(Usuario $usuario) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO usuario (nome_usuario, email, senha, endereco, telefone, tipoUsuario )" .
               " VALUES (:nome, :email, :senha, :telefone)";
        
        $senhaCripto = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);

        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $usuario->getNome());
        $stm->bindValue("email", $usuario->getEmail());
        $stm->bindValue("senha", $senhaCripto);
        $stm->bindValue("endereco", $usuario->getEndereco());
        $stm->bindValue("telefone", $usuario->getTelefone());
        $stm->bindValue("usuario", $usuario->getTipoUsuario());
        $stm->execute();
    }

    //Método para atualizar um Usuario
    public function update(Usuario $usuario) {
        $conn = Connection::getConn();

        $sql = "UPDATE usuarios SET nome_usuario = :nome, login = :login," . 
               " senha = :senha, papel = :papel" .   
               " WHERE id_usuario = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $usuario->getNome());
        $stm->bindValue("login", $usuario->getEmail());
        $stm->bindValue("senha", password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        $stm->bindValue("papel", $usuario->getEndereco());
        $stm->bindValue("idUsuario", $usuario->getIdUsuario());
        $stm->execute();
    }

    //Método para excluir um Usuario pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM usuarios WHERE id_usuario = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

     //Método para alterar a foto de perfil de um usuário
     public function updateFotoPerfil(Usuario $usuario) {
        $conn = Connection::getConn();

        $sql = "UPDATE usuarios SET telefone = ? WHERE id_usuario = ?";

        $stm = $conn->prepare($sql);
        $stm->execute(array($usuario->getTipoUsuario(), $usuario->getIdUsuario()));
    }

    //Método para retornar a quantidade de usuários salvos na base
    public function quantidadeUsuarios() {
        $conn = Connection::getConn();

        $sql = "SELECT COUNT(*) AS qtd_usuario FROM usuario";

        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $result[0]["qtd_usuario"];
    }

    //Método para converter um registro da base de dados em um objeto Usuario
    private function mapUsuario($result) {
        $usuarios = array();
        foreach ($result as $reg) {
            $usuario = new Usuario();
            $usuario->setIdUsuario($reg['idUsuario']);
            $usuario->setNome($reg['nome']);
            $usuario->setEmail($reg['email']);
            $usuario->setSenha($reg['senha']);
            $usuario->setEndereco($reg['endereco']);
            $usuario->setTelefone($reg['telefone']);
            $usuario->setTipoUsuario($reg['tipoUsuario']);            
            array_push($usuarios, $usuario);
        }

        return $usuarios;
    }

}