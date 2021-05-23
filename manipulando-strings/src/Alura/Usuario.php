<?php

namespace App\Alura;

class Usuario
{
    private $nome;
    private $sobrenome;
    private $senha;
    private $tratamento;

    public function __construct(string $nome, string $senha, string $genero)
    {
        $this->setNomeSobrenome($nome);
        $this->validaSenha($senha);

        $this->adcionaTratamentoAoSobrenome($nome, $genero);
    }

    private function adcionaTratamentoAoSobrenome(string $nome, string $genero)
    {
        if ($genero === "M") {
            // \w caracteres maisculos e minusculos, \b final da palavra
            $this->tratamento = preg_replace('/^(\w+)\b/', "Sr.", $nome, 1);
        } 

        if ($genero === "F") {
            // 
            $this->tratamento = preg_replace('/^(\w+)\b/', "Sra.", $nome, 1);
        }
    }

    private function validaSenha(string $senha): void
    {
        // trim remove espaços e alguns carateres não desejados no começo e final da string
        $tamanhoSenha = strlen(trim($senha));

        if ($tamanhoSenha > 6) {
            $this->setSenha($senha);
        } else {
            $this->setSenha("Senha Inválida!");
        }
    }

    public function setNomeSobrenome(string $nome): void
    {
        $nomeSobrenome = explode(" ", $nome, 2);
        
        if (!$nomeSobrenome[0]) {
            $this->nome = "Nome Inválido!";
        } else {
            $this->nome = $nomeSobrenome[0];
        }

        if (!$nomeSobrenome[1]) {
            $this->sobrenome = "Sobrenome Inválido!";
        } else {
            $this->sobrenome = $nomeSobrenome[1];
        }
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getTratamento(): string
    {
        return $this->tratamento;
    }
}