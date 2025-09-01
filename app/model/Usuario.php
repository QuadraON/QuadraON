<?php 
#Nome do arquivo: Usuario.php
#Objetivo: classe Model para Usuario

require_once(__DIR__ . "/enum/UsuarioTipo.php");

class Usuario {

    private ?int $idUsuario = null;
    private ?string $nome = null;
    private ?string $email = null;
    private ?string $senha = null;
    private ?string $endereco = null;
    private ?string $telefone = null;
    private ?string $tipoUsuario = null;


    
    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    public function setIdUsuario(?int $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

   
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    
    public function getEmail(): ?string
    {
        return $this->email;
    }

    
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

   
    public function getSenha(): ?string
    {
        return $this->senha;
    }

   
    public function setSenha(?string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    
    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    
    public function setEndereco(?string $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    
    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    
    public function setTelefone(?string $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    
    public function getTipoUsuario(): ?string
    {
        return $this->tipoUsuario;
    }

   
    public function setTipoUsuario(?string $tipoUsuario): self
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }
    
}