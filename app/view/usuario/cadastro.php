<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0f0f0f;
            margin: 0;
            padding: 0;
            color: #ffffff;
        }

        .container {
            width: 400px;
            margin: 100px auto;
            background-color: #1a1a1a;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 255, 128, 0.2);
        }

        h2 {
            text-align: center;
            color: #00ff88;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #ccc;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border: none;
            background-color: #2b2b2b;
            color: #ffffff;
            border-radius: 6px;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        select:focus {
            outline: none;
            border: 2px solid #00ff88;
        }

        input[type="submit"] {
            background-color: #00ff88;
            color: #000000;
            padding: 12px;
            margin-top: 25px;
            border: none;
            width: 100%;
            font-weight: bold;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #00cc70;
        }

        .link-voltar {
            margin-top: 20px;
            text-align: center;
        }

        .link-voltar a {
            color: #00ff88;
            text-decoration: none;
            font-size: 0.95em;
        }

        .link-voltar a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Usuário</h2>
        <form action="./CadastroController.php?action=salvar" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" 
                value="<?= (isset($dados['usuario']) ? $dados['usuario']->getNome() : '') ?>" >

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" 
                value="<?= (isset($dados['usuario']) ? $dados['usuario']->getEmail() : '') ?>">

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha"
            value="<?= (isset($dados['usuario']) ? $dados['usuario']->getSenha() : '') ?>">

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" 
                value="<?= (isset($dados['usuario']) ? $dados['usuario']->getEndereco() : '') ?>">

            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" 
                value="<?= (isset($dados['usuario']) ? $dados['usuario']->getTelefone() : '') ?>">

            <label for="tipousuario">Tipo de Usuário:</label>
            <select name="tipousuario" id="tipousuario">
                <option value="">Selecione o Tipo de Usuário</option>
                <?php foreach($dados["papeis"] as $tipousuario): ?>
                    <option value="<?= $tipousuario ?>" 
                        <?php 
                            if(isset($dados["usuario"]) && $dados["usuario"]->getTipoUsuario() == $tipousuario) 
                                echo "selected";
                        ?>    
                    >
                        <?= $tipousuario ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <input type="submit" value="Cadastrar">
        </form>

        <?php require_once(__DIR__ . "/../include/msg.php"); ?>

        <div class="link-voltar">
            <p>Já possui conta?<a href="/QuadraON/app/controller/LoginController.php?action=login">Fazer login</a></p>
        </div>
    </div>
</body>
</html>
