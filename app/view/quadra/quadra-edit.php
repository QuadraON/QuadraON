<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Quadra</title>
    <style>
        body { background: #111; color: #fff; }
        .container { max-width: 500px; margin: 40px auto; background: #222; padding: 32px; border-radius: 12px; }
        label { display: block; margin-top: 18px; }
        input, select { width: 100%; padding: 8px; margin-top: 6px; border-radius: 6px; border: none; }
        .btn { margin-top: 24px; padding: 10px 24px; background: #00ff88; color: #222; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; }
        .btn:hover { background: #00cc6a; color: #fff; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Quadra</h2>
        <form action="/QuadraON/app/controller/QuadraController.php?action=save" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idQuadra" value="<?= htmlspecialchars($dados['quadra']['idQuadra']) ?>">
            <label for="nomeQuadra">Nome:</label>
            <input type="text" name="nomeQuadra" id="nomeQuadra" value="<?= htmlspecialchars($dados['quadra']['nome']) ?>" required>

            <label for="tipoQuadra">Tipo:</label>
            <select name="tipoQuadra" id="tipoQuadra" required>
                <?php foreach ($dados["quadras"]['tipoQuadras'] as $tipo): ?>
                    <option value="<?= $tipo ?>" <?= $tipo == $dados['quadra']['quadraTipo'] ? 'selected' : '' ?>><?= $tipo ?></option>
                <?php endforeach; ?>
            </select>

            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="<?= htmlspecialchars($dados['quadra']['descricao']) ?>" required>

            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" accept="image/*">
            <?php if (!empty($dados['quadra']['foto'])): ?>
                <br><img src="/QuadraON/<?= htmlspecialchars($dados['quadra']['foto']) ?>" style="max-width:120px;max-height:120px;border-radius:8px;margin-top:10px;">
            <?php endif; ?>

            <button type="submit" class="btn">Salvar</button>
        </form>
        <a href="/QuadraON/app/controller/QuadraController.php?action=list" class="btn" style="background:#555;color:#fff;margin-top:10px;">Voltar</a>
    </div>
</body>
</html>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>