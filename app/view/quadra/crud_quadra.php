<?php
#Nome do arquivo: quadra/list.php
#Objetivo: interface para listagem das quadras do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<style>
    body {
        background-color: #111;
        color: #f5f5f5;
    }

    h3.text-center {
        color: #55bb77;
        margin-bottom: 30px;
    }

    .container {
        background-color: #1c1c1c;
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.5);
    }

    .btn-success {
        background-color: #55bb77;
        border: none;
    }

    .btn-success:hover {
        background-color: #449c60;
    }

    .btn-primary {
        background-color:rgb(6, 70, 0);
        border: none;
    }

    .btn-primary:hover {
        background-color:rgb(0, 182, 70);
    }

    .btn-danger {
        background-color:rgb(0, 112, 79);
        border: none;
    }

    .btn-danger:hover {
        background-color:rgb(0, 189, 116);
    }

    .table {
        background-color: #2a2a2a;
        color: #f0f0f0;
    }

    .table thead {
        background-color: #333;
        color: #55bb77;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #242424;
    }

    .table-striped tbody tr:nth-of-type(even) {
        background-color: #1a1a1a;
    }

    .table-bordered th,
    .table-bordered td {
        border-color: #444;
    }

    .foto-img {
        max-width: 80px;
        max-height: 80px;
        border-radius: 8px;
        box-shadow: 0 0 6px #333;
    }
</style>

<h3 class="text-center">Quadras</h3>

<div class="container">
    <div class="row">
        <div class="col-3">
            <a class="btn btn-success" 
                href="<?= BASEURL ?>/controller/QuadraController.php?action=create">
                Inserir</a>
        </div>

        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabQuadras" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>ID Usuário</th>
                        <th>Foto</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['lista'] as $quadra): ?>
                        <tr>
                            <td><?= htmlspecialchars($quadra['idQuadra']); ?></td>
                            <td><?= htmlspecialchars($quadra['nome']); ?></td>
                            <td><?= htmlspecialchars($quadra['quadraTipo']); ?></td>
                            <td><?= htmlspecialchars($quadra['descricao']); ?></td>
                            <td><?= htmlspecialchars($quadra['idUsuario']); ?></td>
                            <td>
                                <?php if (!empty($quadra['foto'])): ?>
                                    <img src="/QuadraON/<?= htmlspecialchars($quadra['foto']); ?>" class="foto-img" alt="Foto da quadra">
                                <?php else: ?>
                                    <span style="color:#aaa;">Sem foto</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="btn btn-primary" 
                                    href="<?= BASEURL ?>/controller/QuadraController.php?action=edit&id=<?= $quadra['idQuadra'] ?>">
                                    Alterar</a> 
                            </td>
                            <td>
                                <a class="btn btn-danger" 
                                    onclick="return confirm('Confirma a exclusão da quadra?');"
                                    href="<?= BASEURL ?>/controller/QuadraController.php?action=delete&id=<?= $quadra['idQuadra'] ?>">
                                    Excluir</a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>