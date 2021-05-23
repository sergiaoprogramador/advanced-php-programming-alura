<?php

namespace App\Alura;

class Contato
{
    private $email;
    private $endereco;
    private $cep;

    public function __construct(string $email, string $endereco, string $cep, string $telefone)
    {
        if ($this->validaEmail($email) !== false) {
            $this->setEmail($email);
        } else {
            $this->setEmail("Email inválido!");
        }

        if ($this->validaTelefone($telefone)) {
            $this->setTelefone($telefone);
        } else {
            $this->setTelefone("Telefone Inválido!");
        }
        

        $this->endereco = $endereco;
        $this->cep = $cep;
        
    }

    private function validaTelefone(string $telefone): int
    {
        // 9999-9999
        // ^ indica inicio da string, [0-9] encontrar numeros de 0 a 9, {4} até 4 casas, $ indica o final da string
        return preg_match('/^[0-9]{4}-[0-9]{4}$/', $telefone, $encontrados);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    private function validaEmail(string $email): bool
    {
        // Constante nativa para validação de e-mail
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function setEmail(string $email): void
    {
        $this->email = $email;
    }

    private function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getUsuario(): string
    {
        $posicaoArroba = strpos($this->email, "@");

        if($posicaoArroba === false) return "Usuário Inválido!";

        return substr($this->email, 0, $posicaoArroba);
    }

    public function getEnderecoCep(): string
    {
        $enderecoCep = [$this->endereco, $this->cep];
        return implode(" - ", $enderecoCep);
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }
}