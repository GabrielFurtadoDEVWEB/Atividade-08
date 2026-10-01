<?php

require_once "controller.php";

$instrutor = new Instrutor(
    1,
    "Carlos",
    "carlos@senai.com",
    ["PHP", "Banco de Dados"]
);

$aluno = new Aluno(
    2,
    "João",
    "joao@senai.com"
);

$instrutor->definirSenha("Senha123!");
$aluno->definirSenha("Aluno123!");

$usuarios = [$instrutor, $aluno];

$resultadoInstrutor = validar_login(
    "carlos@senai.com",
    "Senha123!",
    $usuarios
);

$resultadoAluno = validar_login(
    "joao@senai.com",
    "SenhaErrada!",
    $usuarios
);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Atividade 08 - POO</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 30px;
        }

        .usuario {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
        }

        .sucesso {
            color: green;
        }

        .erro {
            color: red;
        }
    </style>
</head>

<body>

    <h1>Atividade 08 - POO</h1>

    <div class="usuario">
        <h2>Instrutor</h2>

        <p><strong>ID:</strong> <?= $instrutor->id ?></p>
        <p><strong>Nome:</strong> <?= $instrutor->nome ?></p>
        <p><strong>E-mail:</strong> <?= $instrutor->email ?></p>
        <p><strong>Tipo:</strong> <?= $instrutor->tipo_formatado() ?></p>

        <p>
            <strong>Matérias:</strong>
            <?= implode(", ", $instrutor->materias_leciona) ?>
        </p>

        <p>
            <strong>Saudação:</strong>
            <?= $instrutor->saudacao() ?>
        </p>

        <p class="<?= $resultadoInstrutor['status'] ?>">
            <strong>Login:</strong>
            [<?= $resultadoInstrutor['status'] ?>]
            <?= $resultadoInstrutor['mensagem'] ?>
        </p>
    </div>


    <div class="usuario">
        <h2>Aluno</h2>

        <p><strong>ID:</strong> <?= $aluno->id ?></p>
        <p><strong>Nome:</strong> <?= $aluno->nome ?></p>
        <p><strong>E-mail:</strong> <?= $aluno->email ?></p>
        <p><strong>Tipo:</strong> <?= $aluno->tipo_formatado() ?></p>
        <p><strong>XP:</strong> <?= $aluno->xp_total ?></p>

        <p>
            <strong>Saudação:</strong>
            <?= $aluno->saudacao() ?>
        </p>

        <p class="<?= $resultadoAluno['status'] ?>">
            <strong>Login:</strong>
            [<?= $resultadoAluno['status'] ?>]
            <?= $resultadoAluno['mensagem'] ?>
        </p>
    </div>

</body>

</html>