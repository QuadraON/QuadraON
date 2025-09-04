<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<?php if(!empty($dados["erro"])): ?>
    <div class="msg-erro">
        <?= htmlspecialchars($dados["erro"]) ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Quadra</title>
    <style>
        .msg-erro {
    background-color: #330000;
    border: 2px solid #ff5555;
    color: #ff5555;
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 8px;
    text-align: center;
    box-shadow: 0 0 10px #ff5555, inset 0 0 5px #ff0000;
    font-weight: bold;
    text-transform: uppercase;
}

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
descricao
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

        input[type="submit"] {
    background: linear-gradient(145deg, #00ff88, #00cc70);
    color: #000000;
    padding: 12px;
    margin-top: 25px;
    border: none;
    width: 100%;
    font-weight: bold;
    cursor: pointer;
    border-radius: 8px;
    box-shadow: 0 0 10px #00ff88, inset 0 0 5px #00cc70;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

input[type="submit"]:hover {
    background: linear-gradient(145deg, #00cc70, #009957);
    box-shadow: 0 0 15px #00ff88, inset 0 0 7px #00cc70;
    transform: translateY(-2px);
}

    </style>
</head>
<body>
    <div class="container">

        <h2>Cadastro de Quadras</h2>
        <form action="./QuadraController.php?action=save" method="POST" enctype="multipart/form-data">

            <label for="foto">Foto da quadra:</label>
            <input type="file" name="foto" id="foto" accept="image/*">

            <label for="nomeQuadra">Nome da Quadra:</label>
            <input type="text" name="nomeQuadra" id="nomeQuadra">

            <label for="endereco">Endereço:</label>
            <input type="text" name="endereco" id="endereco">

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" >

            <label for="tipoQuadra">Tipo de Quadra:</label>
            
            <select name="tipoQuadra" id="tipoQuadra">
                <option value="">Selecione o Tipo de Quadra</option>
                <?php foreach($dados["quadras"]['tipoQuadras'] as $quadraTipo): ?>
                    <option value="<?= $quadraTipo ?>">
                        <?= $quadraTipo ?>
                    </option>

                <?php endforeach; ?>
            </select>
                    
            <input type="submit" value="Cadastrar">
        </form>

        <?php require_once(__DIR__ . "/../include/msg.php"); ?>

    </div>
</body>
</html>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>