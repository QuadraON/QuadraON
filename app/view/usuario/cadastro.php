<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(0, 0, 0);
        }

        .container {
            width: 400px;
            margin: 100px auto;
            background:rgb(85, 187, 119);
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px #aaa;
        }

        h2 {
            text-align: center;
            color:rgb(0, 0, 0);
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"]
        input[type="text"],
        input[type="text"],
        input[type="select"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color:rgb(0, 0, 0);
            color: white;
            padding: 10px;
            margin-top: 20px;
            border: none;
            width: 100%;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #004d40;
        }

        .link-voltar {
            margin-top: 15px;
            text-align: center;
        }

        .link-voltar a {
            color: #00796b;
            text-decoration: none;
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
            <input type="email" name="email" id="email" >

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" >

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco" >

            <label for="telefone">Telefone:</label>
            <input type="text" name="telefone" id="telefone" >

            <label for="tipousuario">Tipo de Usuário:</label>
            <select name="tipousuario" id="tipousuario" >
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
