<?php

require_once "Usuario.php";
require_once "Instrutor.php";
require_once "Aluno.php";

function validar_login(string $email, string $senha, array $usuarios): array
{
    foreach ($usuarios as $usuario) {

        if ($usuario->email === $email) {

            if ($usuario->verificarSenha($senha)) {
                return [
                    'status' => 'sucesso',
                    'mensagem' => 'Login realizado com sucesso.',
                    'usuario' => $usuario
                ];
            }

            return [
                'status' => 'erro',
                'mensagem' => 'Senha incorreta.',
                'usuario' => $usuario
            ];
        }
    }

    return [
        'status' => 'erro',
        'mensagem' => 'E-mail não encontrado.',
        'usuario' => null
    ];
}