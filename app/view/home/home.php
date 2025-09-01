<?php
#Nome do arquivo: usuario/list.php
#Objetivo: interface para listagem dos usuários do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #0f0f0f;
        margin: 0;
        padding: 0;
        color: #ffffff;
    }

    .container {
        margin-top: 100px;
        background-color: #1a1a1a;
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0, 255, 128, 0.2);
    }

    .alert-info {
        background-color: #222;
        color: #fff;
        border: none;
        border-left: 5px solid #00ff88;
        padding: 20px;
        border-radius: 10px;
    }

    h4 {
        color: #00ff88;
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
        margin-bottom: 5px;
        color: #ccc;
    }

    input.form-control { 
        background-color: #2b2b2b;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 6px;
        width: 100%;
    }

    input.form-control:focus {
        border: 2px solid #00ff88;
        outline: none;
    }

    .btn-success {
        background-color: #00ff88;
        color: #000;
        border: none;
        padding: 12px 20px;
        font-weight: bold;
        border-radius: 6px;
        transition: background-color 0.3s ease;
    }

    .btn-success:hover {
        background-color: #00cc70;
    }

    a {
        color: #00ff88;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    span {
        display: block;
        margin-top: 15px;
        color: #aaa;
    }

    .col-6 {
        padding: 15px;
    }

    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    width: 90%;
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

@media (max-width: 768px) {
    .container {
        padding: 10px;
    }

    h1 {
        font-size: 1.5rem;
    }
}
</style>
<link rel="stylesheet" href="<?= BASEURL ?>/view/css/home.css">

<h3 class="text-center">Página inicial do sistema</h3>

<div class="container">
    <span>Quantidade de usuários cadastrados no sistema: </span>
    <span class="fonteBonita">
        <?php echo $dados["qtdUsuarios"] ?>
    </span>
    <button class="btn btn-info" 
        onclick="carregarUsuarios('<?= BASEURL ?>')">Ajax</button>

    <div>
        <ul id="listaUsuarios">
            
        </ul>
    </div>
</div>

<h2>Quadras Cadastradas</h2>
<?php if (!empty($dados["quadras"])) : ?>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados["quadras"] as $quadra) : ?>
                <tr>
                    <td><?= htmlspecialchars($quadra['idQuadra']) ?></td>
                    <td><?= htmlspecialchars($quadra['nome']) ?></td>
                    <td><?= htmlspecialchars($quadra['quadraTipo']) ?></td>
                    <td><?= htmlspecialchars($quadra['descricao']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Nenhuma quadra cadastrada.</p>
<?php endif; ?>

<script src="<?= BASEURL ?>/view/js/home_ajax.js"></script>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>