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


    /**
     * Get the value of idUsuario
     */
    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     */
    public function setIdUsuario(?int $idUsuario): self
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome(?string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of senha
     */
    public function getSenha(): ?string
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     */
    public function setSenha(?string $senha): self
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of endereco
     */
    public function getEndereco(): ?string
    {
        return $this->endereco;
    }

    /**
     * Set the value of endereco
     */
    public function setEndereco(?string $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     */
    public function setTelefone(?string $telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of tipoUsuario
     */
    public function getTipoUsuario(): ?string
    {
        return $this->tipoUsuario;
    }

    /**
     * Set the value of tipoUsuario
     */
    public function setTipoUsuario(?string $tipoUsuario): self
    {
        $this->tipoUsuario = $tipoUsuario;

        return $this;
    }
    
}