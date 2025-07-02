<?php
#Nome do arquivo: UsuarioDAO.php
#Objetivo: classe DAO para o model de Usuario

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Usuario.php");

class UsuarioDAO {

    //Método para listar os usuários
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM Usuario u ORDER BY u.nome";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapUsuario($result);
    }

    //Buscar por ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM Usuario u WHERE u.idUsuario = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $usuarios = $this->mapUsuario($result);

        if(count($usuarios) == 1)
            return $usuarios[0];
        elseif(count($usuarios) == 0)
            return null;

        die("UsuarioDAO.findById() - Erro: mais de um usuário encontrado.");
    }

    //Login por email e senha
    public function findByEmailSenha(string $email, string $senha) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM Usuario u WHERE BINARY u.email = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$email]);
        $result = $stm->fetchAll();

        $usuario = $this->mapUsuario($result);

        if(count($usuario) == 1) {
            if(password_verify($senha, $usuario[0]->getSenha()))
                return $usuario[0];
            else
                return null;
        } elseif(count($usuario) == 0)
            return null;

        die("UsuarioDAO.findByEmailSenha() - Erro: mais de um usuário encontrado.");
    }

    //Inserir novo usuário
    public function insert(Usuario $usuario) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO Usuario (nome, email, senha, endereco, telefone, tipoUsuario)
                VALUES (:nome, :email, :senha, :endereco, :telefone, :tipoUsuario)";
        
        $senhaCripto = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);

        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $usuario->getNome());
        $stm->bindValue("email", $usuario->getEmail());
        $stm->bindValue("senha", $senhaCripto);
        $stm->bindValue("endereco", $usuario->getEndereco());
        $stm->bindValue("telefone", $usuario->getTelefone());
        $stm->bindValue("tipoUsuario", $usuario->getTipoUsuario());
        $stm->execute();
    }

    //Atualizar usuário
    public function update(Usuario $usuario) {
        $conn = Connection::getConn();

        $sql = "UPDATE Usuario SET nome = :nome, email = :email, senha = :senha,
                endereco = :endereco, telefone = :telefone, tipoUsuario = :tipoUsuario
                WHERE idUsuario = :idUsuario";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $usuario->getNome());
        $stm->bindValue("email", $usuario->getEmail());
        $stm->bindValue("senha", password_hash($usuario->getSenha(), PASSWORD_DEFAULT));
        $stm->bindValue("endereco", $usuario->getEndereco());
        $stm->bindValue("telefone", $usuario->getTelefone());
        $stm->bindValue("tipoUsuario", $usuario->getTipoUsuario());
        $stm->bindValue("idUsuario", $usuario->getIdUsuario());
        $stm->execute();
    }

    //Excluir por ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM Usuario WHERE idUsuario = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

    //Atualizar a "foto de perfil" (tipoUsuario no seu código original)
    public function updateFotoPerfil(Usuario $usuario) {
        $conn = Connection::getConn();

        $sql = "UPDATE Usuario SET tipoUsuario = ? WHERE idUsuario = ?";

        $stm = $conn->prepare($sql);
        $stm->execute(array($usuario->getTipoUsuario(), $usuario->getIdUsuario()));
    }

    //Quantidade de usuários
    public function quantidadeUsuarios() {
        $conn = Connection::getConn();

        $sql = "SELECT COUNT(*) AS qtd_usuario FROM Usuario";

        $stm = $conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $result[0]["qtd_usuario"];
    }

    //Mapeamento de resultados para objetos
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
