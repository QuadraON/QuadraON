<?php 
#Nome do arquivo: Reserva.php
#Objetivo: classe Model para Reserva

require_once(__DIR__ . "/enum/SituacaoPagamento.php");

class Reserva {

    private ?int $idReserva = null;
    private ?int $idQuadra = null;
    private ?int $idUsuario = null;
    private ?string $data = null;           
    private ?string $horaInicio = null;     
    private ?string $horaFim = null;        
    private ?string $situacaoPagamento = null;
    private ?int $avaliacao = null;
    private ?string $comentario = null;

    public function getIdReserva(): ?int
    {
        return $this->idReserva;
    }

    public function setIdReserva(?int $idReserva): self
    {
        $this->idReserva = $idReserva;
        return $this;
    }

    public function getIdQuadra(): ?int
    {
        return $this->idQuadra;
    }

    public function setIdQuadra(?int $idQuadra): self
    {
        $this->idQuadra = $idQuadra;
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

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function getHoraInicio(): ?string
    {
        return $this->horaInicio;
    }

    public function setHoraInicio(?string $horaInicio): self
    {
        $this->horaInicio = $horaInicio;
        return $this;
    }

    public function getHoraFim(): ?string
    {
        return $this->horaFim;
    }

    public function setHoraFim(?string $horaFim): self
    {
        $this->horaFim = $horaFim;
        return $this;
    }

    public function getSituacaoPagamento(): ?string
    {
        return $this->situacaoPagamento;
    }

    public function setSituacaoPagamento(?string $situacaoPagamento): self
    {
        $this->situacaoPagamento = $situacaoPagamento;
        return $this;
    }

    public function getAvaliacao(): ?int
    {
        return $this->avaliacao;
    }

    public function setAvaliacao(?int $avaliacao): self
    {
        $this->avaliacao = $avaliacao;
        return $this;
    }

    public function getComentario(): ?string
    {
        return $this->comentario;
    }

    public function setComentario(?string $comentario): self
    {
        $this->comentario = $comentario;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'idReserva' => $this->idReserva,
            'idQuadra' => $this->idQuadra,
            'idUsuario' => $this->idUsuario,
            'data' => $this->data,
            'horaInicio' => $this->horaInicio,
            'horaFim' => $this->horaFim,
            'situacaoPagamento' => $this->situacaoPagamento?->value,
            'avaliacao' => $this->avaliacao,
            'comentario' => $this->comentario
        ];
    }
}
