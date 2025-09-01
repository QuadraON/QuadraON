<?php 
#Nome do arquivo: Quadra.php
#Objetivo: classe Model para Quadra

require_once(__DIR__ . "/enum/QuadraTipo.php");

class Quadra {

    private ?int $idQuadra = null;
    private ?string $quadraTipo = null;
    private ?string $descricao = null;
    private ?int $idUsuario = null;

    
    public function getIdQuadra(): ?int
    {
        return $this->idQuadra;
    }

    
    public function setIdQuadra(?int $idQuadra): self
    {
        $this->idQuadra = $idQuadra;
        return $this;
    }

    
    public function getQuadraTipo(): ?string
    {
        return $this->quadraTipo;
    }

   
    public function setQuadraTipo(?string $quadraTipo): self
    {
        $this->quadraTipo = $quadraTipo;
        return $this;
    }

    
    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    
    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    
    public function getIdUsuario(): ?int
    {
        return $this->idUsuario;
    }

    
    public function setIdUsuario(?int $idUsuario): self
    {
        $this->idUsuario = $idUsuario;
        return $this;
    }

}
