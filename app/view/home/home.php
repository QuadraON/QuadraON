<?php
#Nome do arquivo: home.php
#Objetivo: homepage bonita e organizada do sistema QuadraON

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<link rel="stylesheet" href="<?= BASEURL ?>/view/css/home.css">

<!-- Seção Hero -->
<div class="hero-section bg-dark text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold">Bem-vindo ao QuadraON</h1>
                <p class="lead">O sistema completo para reserva e gestão de quadras esportivas. Reserve sua quadra favorita de forma rápida e fácil!</p>
                <a href="<?= BASEURL ?>/controller/QuadraController.php?action=list" class="btn btn-success btn-lg">Ver Quadras Disponíveis</a>
            </div>
            <div class="col-md-6 text-center">
                <!-- <img src="https://lnfoficial.com.br/media/2022/11/14.11.2022-Foz-Foto-Assessoria-Foz.jpg" alt="IFPR Foz do Iguaçu" class="img-fluid rounded shadow"> -->

                <div id="carousel" class="carousel slide">
                    <div class="carousel-inner">

                        <div class="carousel-item active">
                            <img src="<?= BASEURL . "/../" . $dados["ultimas"][3]['foto'] ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?= $dados["ultimas"][3]['nome'] ?></h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>

                        <?php foreach ($dados["ultimas"] as $ultimas_quadras): ?>

                            <div class="carousel-item">
                                <img src="<?= BASEURL . "/../" . $ultimas_quadras['foto'] ?>" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block text-center">
                                    <h5><?=  $ultimas_quadras['nome'] ?></h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>


                        <?php endforeach; ?>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">anterior</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">próximo</span>
                    </button>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- Seção de Recursos -->
<div class="features-section py-5">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #00ff88;">Recursos Principais</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card bg-secondary text-white h-100 border-0 shadow">
                    <div class="card-body text-center">
                        <i class="fas fa-calendar-check fa-3x mb-3" style="color: #00ff88;"></i>
                        <h5 class="card-title">Reserve Quadras</h5>
                        <p class="card-text">Agende suas partidas esportivas em quadras disponíveis com facilidade.</p>
                        <a href="<?= BASEURL ?>/controller/QuadraController.php?action=list" class="btn btn-success">Reservar Agora</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-secondary text-white h-100 border-0 shadow">
                    <div class="card-body text-center">
                        <i class="fas fa-list fa-3x mb-3" style="color: #00ff88;"></i>
                        <h5 class="card-title">Gerencie Reservas</h5>
                        <p class="card-text">Visualize e gerencie suas reservas de quadras de forma organizada.</p>
                        <a href="<?= BASEURL ?>/controller/QuadraController.php?action=reservas" class="btn btn-success">Minhas Reservas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card bg-secondary text-white h-100 border-0 shadow">
                    <div class="card-body text-center">
                        <i class="fas fa-user fa-3x mb-3" style="color: #00ff88;"></i>
                        <h5 class="card-title">Perfil do Usuário</h5>
                        <p class="card-text">Atualize suas informações pessoais e gerencie seu perfil.</p>
                        <a href="<?= BASEURL ?>/controller/PerfilController.php?action=view" class="btn btn-success">Editar Perfil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Seção de Estatísticas -->
<div class="stats-section bg-dark py-5">
    <div class="container">
        <h2 class="text-center mb-4" style="color: #00ff88;">Estatísticas do Sistema</h2>
        <div class="row text-center">
            <div class="col-md-6 mb-4">
                <div class="stat-card">
                    <h3 class="display-4 fw-bold" style="color: #00ff88;"><?php echo isset($dados["qtdUsuarios"]) ? $dados["qtdUsuarios"] : 0; ?></h3>
                    <p class="lead">Usuários Cadastrados</p>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="stat-card">
                    <h3 class="display-4 fw-bold" style="color: #00ff88;"><?php echo isset($dados["qtdQuadras"]) ? $dados["qtdQuadras"] : 0; ?></h3>
                    <p class="lead">Quadras Disponíveis</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome para ícones -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<?php
require_once(__DIR__ . "/../include/footer.php");
?>