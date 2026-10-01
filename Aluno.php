<?php

require_once "Usuario.php";

class Aluno extends Usuario
{
    public int $xp_total = 0;

    public function __construct(
        int $id,
        string $nome,
        string $email
    ) {
        parent::__construct($id, $nome, $email, "aluno");
    }
}