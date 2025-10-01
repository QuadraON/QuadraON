<?php $hoje = date('Y-m-d'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alugar Quadra</title>
    <style>
        body {
            background: #111;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 420px;
            margin: 48px auto;
            background: #222;
            padding: 32px 28px;
            border-radius: 14px;
            box-shadow: 0 0 18px rgba(0,255,136,0.10);
        }
        h2 {
            color: #00ff88;
            text-align: center;
            margin-bottom: 28px;
            font-size: 2rem;
        }
        label {
            display: block;
            margin-top: 18px;
            font-weight: bold;
            color: #00ff88;
        }
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 8px;
            margin-top: 6px;
            border-radius: 6px;
            border: none;
            background: #333;
            color: #fff;
            font-size: 1rem;
        }
        .alugar-btn {
            display: block;
            width: 100%;
            margin-top: 28px;
            padding: 12px 0;
            background: #00ff88;
            color: #1a1a1a;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s;
        }
        .alugar-btn:hover {
            background: #00cc6a;
            color: #fff;
        }
        .back-btn {
            display: block;
            width: 100%;
            margin-top: 18px;
            padding: 10px 0;
            background: #555;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            transition: background 0.2s;
        }
        .back-btn:hover {
            background: #333;
            color: #00ff88;
        }
    </style>
</head>
<body>
    <?php $quadra = $dados['quadra'] ?? []; ?>
    <div class="container">
        <h2>Alugar Quadra</h2>
        <?php if (isset($dados['erro'])): ?>
            <p style="color: red; text-align: center;"><?php echo htmlspecialchars($dados['erro']); ?></p>
        <?php endif; ?>
        <form action="/QuadraON/app/controller/QuadraController.php?action=alugar" method="post">
            <!-- Campo oculto para enviar o id da quadra -->
            <input type="hidden" name="idQuadra" value="<?= htmlspecialchars($quadra['idQuadra'] ?? '') ?>">

            <label for="data">Data:</label>
            <input type="date" name="data" id="data" required min="<?= $hoje ?>">

            <label for="horaInicio">Hora de início:</label>
            <input type="time" name="horaInicio" id="horaInicio" required step="3600">

            <label for="horaFim">Hora de término:</label>
            <input type="time" name="horaFim" id="horaFim" required step="3600">

           
            <button type="submit" class="alugar-btn">Confirmar Aluguel</button>
        </form>
        <a href="/QuadraON/app/controller/QuadraController.php?action=list" class="back-btn">Voltar</a>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        function ajustarParaHoraCheia(input) {
            input.addEventListener('input', function() {
                let valor = input.value;
                if (valor) {
                    let partes = valor.split(':');
                    if (partes.length > 1) {
                        input.value = partes[0].padStart(2, '0') + ':00';
                    }
                }
            });
        }
        ajustarParaHoraCheia(document.getElementById('horaInicio'));
        ajustarParaHoraCheia(document.getElementById('horaFim'));
    });
    </script>
</body>
</html>