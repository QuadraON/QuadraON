<?php
#Nome do arquivo: usuario/list.php
#Objetivo: interface para listagem dos usuários do sistema

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
</style>

<h3 class="text-center">Usuários</h3>


<div class="container">
    <div class="row">
        <div class="col-3">
            <a class="btn btn-success" 
                href="<?= BASEURL ?>/controller/UsuarioController.php?action=create">
                Inserir</a>
        </div>

        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabUsuarios" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Tipo</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['lista'] as $usu): ?>
                        <tr>
                            <td><?php echo $usu->getIdUsuario(); ?></td>
                            <td><?= $usu->getNome(); ?></td>
                            <td><?= $usu->getEmail(); ?></td>
                            <td><?= $usu->getEndereco(); ?></td>
                            <td><?= $usu->getTelefone(); ?></td>
                            <td><?= $usu->getTipoUsuario(); ?></td>
                            <td><a class="btn btn-primary" 
                                href="<?= BASEURL ?>/controller/UsuarioController.php?action=edit&id=<?= $usu->getIdUsuario() ?>">
                                Alterar</a> 
                            </td>
                            <td><a class="btn btn-danger" 
                                onclick="return confirm('Confirma a exclusão do usuário?');"
                                href="<?= BASEURL ?>/controller/UsuarioController.php?action=delete&id=<?= $usu->getIdUsuario() ?>">
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
