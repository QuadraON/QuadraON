<?php require_once(__DIR__ . "/../include/header.php"); ?>
<?php require_once(__DIR__ . "/../include/menu.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas da Quadra</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0f0f0f;
            margin: 0;
            padding: 0;
            color: #ffffff;
        }

        .container {
            margin-top: 40px;
            width: 90%;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            text-align: center;
            color: #00ff88;
            margin-bottom: 30px;
        }

        .quadra-info {
            background-color: #1a1a1a;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 255, 128, 0.2);
            margin-bottom: 30px;
            text-align: center;
        }

        .quadra-info h2 {
            color: #00ff88;
            margin-bottom: 10px;
        }

        .reserva-card {
            background-color: #1a1a1a;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 255, 128, 0.2);
            margin-bottom: 15px;
            transition: transform 0.2s ease;
        }

        .reserva-card:hover {
            transform: translateY(-2px);
        }

        .reserva-card h3 {
            color: #00ff88;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .info {
            margin: 5px 0;
            font-size: 1rem;
        }

        .info span {
            font-weight: bold;
            color: #00ff88;
        }

        .back-btn {
            display: block;
            width: 200px;
            margin: 30px auto 0 auto;
            padding: 10px 0;
            background: #00ff88;
            color: #1a1a1a;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            transition: background 0.2s;
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
    <h1>Horários Alugados</h1>

    <?php $quadra = $dados['quadra'] ?? []; ?>
    <?php if ($quadra): ?>
        <div class="quadra-info">
            <h2><?php echo htmlspecialchars($quadra['nome']); ?></h2>
            <p><?php echo htmlspecialchars($quadra['endereco']); ?></p>
        </div>

        <?php $reservas = $dados['reservas'] ?? []; ?>
        <?php if (!empty($reservas)): ?>
            <?php foreach ($reservas as $reserva): ?>
                <div class="reserva-card">
                    <h3>Reserva  <?php echo htmlspecialchars($reserva['idReserva'] ?? ''); ?></h3>
                    <div class="info"><span>Data:</span> <?php echo htmlspecialchars($reserva['data'] ?? ''); ?></div>
                    <div class="info"><span>Horário:</span> <?php echo htmlspecialchars($reserva['horaInicio'] ?? ''); ?> - <?php echo htmlspecialchars($reserva['horaFim'] ?? ''); ?></div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma reserva encontrada para esta quadra.</p>
        <?php endif; ?>

        <a href="/QuadraON/app/controller/QuadraController.php?action=list" class="back-btn">Voltar para Lista</a>
    <?php else: ?>
        <p>Quadra não encontrada.</p>
        <a href="/QuadraON/app/controller/QuadraController.php?action=list" class="back-btn">Voltar</a>
    <?php endif; ?>
</div>

</body>
</html>

<?php require_once(__DIR__ . "/../include/footer.php"); ?>
