<?php
class LoginService {

    public function validarCampos($email, $senha): array {
        $erros = [];

        if (empty($email)) {
            $erros[] = "O campo email é obrigatório.";
        }

        if (empty($senha)) {
            $erros[] = "O campo senha é obrigatório.";
        }

        return $erros;
    }

    public function salvarUsuarioSessao($usuario): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['usuario'] = $usuario;
    }

    public function removerUsuarioSessao(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_destroy();
    }
}