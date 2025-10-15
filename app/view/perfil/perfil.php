<?php
#Nome do arquivo: perfil/perfil.php
#Objetivo: interface para perfil dos usuários do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<div class="container my-4">
    <h3 class="text-center mb-4">
        <i class="bi bi-person-circle"></i> Perfil do Usuário
    </h3>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-info-circle"></i> Informações Pessoais
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center border-bottom pb-2">
                                <i class="bi bi-person-fill me-3 text-primary fs-4"></i>
                                <div>
                                    <label class="form-label fw-bold mb-1">Nome</label>
                                    <p class="mb-0 text-muted"><?= $dados['usuario']->getNome() ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center border-bottom pb-2">
                                <i class="bi bi-envelope-fill me-3 text-primary fs-4"></i>
                                <div>
                                    <label class="form-label fw-bold mb-1">Email</label>
                                    <p class="mb-0 text-muted"><?= $dados['usuario']->getEmail() ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center border-bottom pb-2">
                                <i class="bi bi-shield-check me-3 text-primary fs-4"></i>
                                <div>
                                    <label class="form-label fw-bold mb-1">Tipo de Usuário</label>
                                    <p class="mb-0 text-muted"><?= $dados['usuario']->getTipoUsuario() ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center border-bottom pb-2">
                                <i class="bi bi-geo-alt-fill me-3 text-primary fs-4"></i>
                                <div>
                                    <label class="form-label fw-bold mb-1">Endereço</label>
                                    <p class="mb-0 text-muted"><?= $dados['usuario']->getEndereco() ?: 'Não informado' ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-telephone-fill me-3 text-primary fs-4"></i>
                                <div>
                                    <label class="form-label fw-bold mb-1">Telefone</label>
                                    <p class="mb-0 text-muted"><?= $dados['usuario']->getTelefone() ?: 'Não informado' ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back Button -->
    <div class="row mt-4">
        <div class="col-12 text-center">
            <a class="btn btn-secondary btn-lg" href="<?= BASEURL ?>/controller/HomeController.php?action=home">
                <i class="bi bi-arrow-left"></i> Voltar
            </a>
        </div>
    </div>
</div>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>
