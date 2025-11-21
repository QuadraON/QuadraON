<?php
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadras</title>
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

        .card {
            background-color: #1a1a1a;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 255, 128, 0.2);
            margin-bottom: 20px;
            transition: transform 0.2s ease, box-shadow 0.3s ease;
            color: #ffffffff;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 255, 128, 0.4);
        }

        .card h2 {
            color: #00ff88;
            margin-top: 0;
            margin-bottom: 15px;
        }

        .info {
            margin: 8px 0;
            font-size: 1rem;
        }

        .info span {
            font-weight: bold;
            color: #00ff88;
        }

        p {
            text-align: center;
            color: #aaa;
            font-size: 1.1rem;
        }

        header,
        nav,
        footer {
            background-color: #1a1a1a;
            padding: 20px;
            text-align: center;
            border-bottom: 2px solid #00ff88;
        }

        nav a {
            margin: 0 15px;
            color: #00ff88;
            text-decoration: none;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        footer {
            margin-top: 40px;
            border-top: 2px solid #00ff88;
            font-size: 0.9rem;
            color: #aaa;
        }
/* 
        .quadra-container .row {
            gap: 20px;
        }

        .quadra-container .card {
            width: calc(33.33% - 13.33px);
        } */

        .quadra-container .card {
            min-height: 500px;
        }

        .quadra-container .card-text {
            text-align: justify;
        }

        .quadra-container .card-image-wrapper {
            height: 200px;
            border-radius: 5px;
            overflow: hidden;
        }
    </style>
</head>

<body>

    <!-- Containers para injetar os arquivos HTML -->
    <div id="header"></div>
    <div id="menu"></div>

    <div class="container quadra-container">
        <h1>Quadras Cadastradas</h1>

        <div class="row">

            <?php if (!empty($dados["quadras"])) : ?>
                <?php foreach ($dados["quadras"] as $quadra) : ?>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">

                            <div class="card-image-wrapper">
                                <img src="/QuadraON/<?= htmlspecialchars($quadra['foto']) ?>" class="card-img-top" alt="...">
                            </div>


                            <div class="card-body">

                                <span class="badge rounded-pill text-bg-warning mb-3"><?= htmlspecialchars($quadra['quadraTipo']) ?></span>


                                <h5 class="card-title"><?= ucfirst(htmlspecialchars($quadra['nome'])) ?></h5>
                                <p class="card-text"><?= substr(htmlspecialchars($quadra['descricao']), 0, 100)  ?> ...</p>
                                <a href="/QuadraON/app/view/quadra/alugar-view.php?id=<?= urlencode($quadra['idQuadra']) ?>" class="btn btn-primary">Reservar</a>
                            </div>
                        </div>
                    </div>


                <?php endforeach; ?>
            <?php else : ?>
                <p>Nenhuma quadra cadastrada.</p>
            <?php endif; ?>

        </div>
    </div>

    <div id="footer"></div>

    <script>
        function loadHTML(id, file) {
            fetch(file)
                .then(response => response.text())
                .then(data => {
                    document.getElementById(id).innerHTML = data;
                });
        }
    </script>

</body>

</html>

<?php
require_once(__DIR__ . "/../include/footer.php");
?>