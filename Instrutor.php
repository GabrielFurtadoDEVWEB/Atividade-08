<?php

require_once "Usuario.php";

class Instrutor extends Usuario
{
    public array $materias_leciona;

    public function __construct(
        int $id,
        string $nome,
        string $email,
        array $materias_leciona
    ) {
        parent::__construct($id, $nome, $email, "instrutor");

        $this->materias_leciona = $materias_leciona;
    }
}