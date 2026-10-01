<?php

class Usuario
{
    public int $id;
    public string $nome;
    public string $email;
    public string $tipo;

    private string $senha_hash;

    public function __construct(
        int $id,
        string $nome,
        string $email,
        string $tipo
    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->tipo = $tipo;
    }

    public function saudacao(): string
    {
        return "Olá, {$this->nome}!";
    }

    public function tipo_formatado(): string
    {
        return ucfirst(strtolower($this->tipo));
    }

    public function definirSenha(string $senha): void
    {
        $this->senha_hash = password_hash($senha, PASSWORD_BCRYPT);
    }

    public function verificarSenha(string $senha): bool
    {
        return password_verify($senha, $this->senha_hash);
    }
}