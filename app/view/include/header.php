<?php
#Nome do arquivo: view/include/header.php
#Objetivo: header a ser utilizado em todas as páginas do projeto

include_once(__DIR__ . "/../../util/config.php");
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo APP_NAME; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Estilo personalizado dark/neon -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0f0f0f;
            margin: 0;
            padding: 0;
            color: #ffffff;
        }

        .container {
            background-color: #1a1a1a;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 255, 128, 0.1);
            padding: 20px;
            margin-top: 40px;
        }

        h1, h2, h3, h4, h5 {
            color: #00ff88;
        }

        a {
            color: #00ff88;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .btn-success {
            background-color: #00ff88;
            color: #000;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #00cc70;
        }

        input.form-control,
        select.form-control {
            background-color: #2b2b2b;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 10px;
        }

        input.form-control:focus,
        select.form-control:focus {
            border: 2px solid #00ff88;
            outline: none;
        }

        .alert {
            background-color: #222;
            color: #fff;
            border-left: 5px solid #00ff88;
        }
    </style>
</head>
<body>
