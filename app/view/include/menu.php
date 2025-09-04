<?php
#Nome do arquivo: view/include/menu.php
#Objetivo: menu da aplicação para ser incluído em outras páginas

$nome = "(Sessão expirada)";
if (isset($_SESSION[SESSAO_USUARIO_NOME]))
    $nome = $_SESSION[SESSAO_USUARIO_NOME];

?>

<style>
    .navbar {
        background-color: #222 !important;
        padding: 12px 24px;
    }

    .navbar .nav-link {
        color: #fff !important;
        transition: color 0.3s ease;
    }

    .navbar .nav-link:hover,
    .navbar .dropdown-item:hover {
        color: #55bb77 !important;
    }

    .navbar .dropdown-menu {
        background-color: #333;
        border: none;
    }

    .navbar .dropdown-item {
        color: #fff;
        transition: background 0.2s ease, color 0.2s ease;
    }

    .navbar .dropdown-item:hover {
        background-color: #444;
        color: #55bb77;
    }

    .navbar-toggler {
        border-color: #fff;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255,255,255,1%29)' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
    }
</style>

<nav class="navbar navbar-expand-md bg-light px-3 mb-3">
    <button class="navbar-toggler" type="button"
        data-bs-toggle="collapse" data-bs-target="#navSite">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navSite">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= HOME_PAGE ?>">Home</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                    data-bs-toggle="dropdown">
                    Cadastros
                </a>
                

                <div class="dropdown-menu">
                    <a class="dropdown-item"
                        href="<?= BASEURL . '/controller/UsuarioController.php?action=list' ?>">Usuários</a>
                    <a class="dropdown-item" href="#">Outro cadastro</a>
                </div>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                    data-bs-toggle="dropdown">
                    Quadras
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= BASEURL . '/controller/QuadraController.php?action=list' ?>">Quadras</a>
                    <a class="dropdown-item" href="<?= BASEURL . '/controller/QuadraController.php?action=create' ?>">Cadastrar Quadras</a>
                    <a class="dropdown-item" href="<?= BASEURL . '/controller/QuadraController.php?action=crudquadra' ?>">Alterar Quadras</a>
                </div>
            </li>

        </ul>

        <ul class="navbar-nav ms-auto mr-3">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarUsuario"
                    data-bs-toggle="dropdown">
                    <?= $nome ?>
                </a>

                <div class="dropdown-menu">
                    <a class="dropdown-item"
                        href="<?= BASEURL . '/controller/PerfilController.php?action=view' ?>">Perfil</a>
                    <a class="dropdown-item" href="<?= LOGOUT_PAGE ?>">Sair</a>
                </div>
                
        </ul>
    </div>
</nav>