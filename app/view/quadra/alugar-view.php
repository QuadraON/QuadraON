<?php
require_once(__DIR__ . "/../../dao/QuadraDAO.php");

$idQuadra = isset($_GET['id']) ? intval($_GET['id']) : 0;

$quadraDAO = new QuadraDAO();
$quadra = null;

// Buscar quadra pelo id
if ($idQuadra > 0) {
    $quadras = $quadraDAO->buscarTodas();
    foreach ($quadras as $q) {
        if ($q['idQuadra'] == $idQuadra) {
            $quadra = $q;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Quadra</title>
    <style>
        body {
            background-color: #0f0f0f;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }
        .alugar-btn {
    display: block;
    margin: 24px auto 0 auto;
    padding: 10px 28px;
    background: #00ff88;
    color: #1a1a1a;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: bold;
    text-decoration: none;
    transition: background 0.2s;
    text-align: center;
    cursor: pointer;
}
.alugar-btn:hover {
    background: #00cc6a;
    color: #fff;
}
        .container {
            margin: 40px auto;
            max-width: 500px;
            background-color: #1a1a1a;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(0,255,136,0.15);
            padding: 32px 24px;
        }
        .card {
            background: none;
            box-shadow: none;
            border-radius: 0;
            padding: 0;
        }
        h2 {
            color: #00ff88;
            margin-bottom: 24px;
            text-align: center;
            font-size: 2rem;
        }
        .info {
            margin: 16px 0;
            font-size: 1.1rem;
            padding: 12px 18px;
            background: #222;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0,255,136,0.08);
            display: flex;
            align-items: center;
        }
        .info span {
            font-weight: bold;
            color: #00ff88;
            margin-right: 10px;
            min-width: 120px;
            display: inline-block;
        }
        .back-btn {
            display: block;
            margin: 32px auto 0 auto;
            padding: 10px 28px;
            background: #00ff88;
            color: #1a1a1a;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            transition: background 0.2s;
            text-align: center;
            cursor: pointer;
        }
        .back-btn:hover {
            background: #00cc6a;
            color: #fff;
        }
        p {
            text-align: center;
            color: #aaa;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php if ($quadra): ?>
         <div style="text-align:center;">
                <img src="/QuadraON/<?= htmlspecialchars($quadra['foto']) ?>" alt="Foto da quadra" style="max-width:220px;max-height:220px;border-radius:12px;margin-bottom:18px;box-shadow:0 0 10px #00ff88;">
            </div>
        <div class="card">
            <h2><?= htmlspecialchars($quadra['nome']) ?></h2>
            <div class="info"><span>ID:</span> <?= htmlspecialchars($quadra['idQuadra']) ?></div>
            <div class="info"><span>Tipo:</span> <?= htmlspecialchars($quadra['quadraTipo']) ?></div>
            <div class="info"><span>Descrição:</span> <?= htmlspecialchars($quadra['descricao']) ?></div>
            <div class="info"><span>Endereço:</span> <?= htmlspecialchars($quadra['endereco']) ?></div>
        </div>
        
        <a href="/QuadraON/app/controller/QuadraController.php?action=alugar&id=<?= htmlspecialchars($quadra['idQuadra']) ?>" class="alugar-btn">Alugar</a>
        <a href="/QuadraON/app/controller/QuadraController.php?action=reservas&id=<?= htmlspecialchars($quadra['idQuadra']) ?>" class="back-btn">Ver Reservas</a>
        <a href="/QuadraON/app/controller/QuadraController.php?action=list" class="back-btn">Voltar</a>
    <?php else: ?>
        <p>Quadra não encontrada.</p>
        <a href="/QuadraON/app/controller/QuadraController.php?action=list" class="back-btn">Voltar</a>
    <?php endif; ?>
    </div>