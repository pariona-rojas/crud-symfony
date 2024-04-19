<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $parte = null;

    #[ORM\Column(length: 255)]
    private ?string $delito = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $fecha = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $hora = null;

    #[ORM\Column(length: 255)]
    private ?string $grupo = null;

    #[ORM\Column(length: 255)]
    private ?string $direccion = null;

    #[ORM\Column(length: 255)]
    private ?string $zona = null;

    #[ORM\Column(length: 255)]
    private ?string $efectivo = null;

    #[ORM\Column(length: 255)]
    private ?string $resumen = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParte(): ?int
    {
        return $this->parte;
    }

    public function setParte(int $parte): static
    {
        $this->parte = $parte;

        return $this;
    }

    public function getDelito(): ?string
    {
        return $this->delito;
    }

    public function setDelito(string $delito): static
    {
        $this->delito = $delito;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): static
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getHora(): ?\DateTimeInterface
    {
        return $this->hora;
    }

    public function setHora(\DateTimeInterface $hora): static
    {
        $this->hora = $hora;

        return $this;
    }

    public function getGrupo(): ?string
    {
        return $this->grupo;
    }

    public function setGrupo(string $grupo): static
    {
        $this->grupo = $grupo;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): static
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getZona(): ?string
    {
        return $this->zona;
    }

    public function setZona(string $zona): static
    {
        $this->zona = $zona;

        return $this;
    }

    public function getEfectivo(): ?string
    {
        return $this->efectivo;
    }

    public function setEfectivo(string $efectivo): static
    {
        $this->efectivo = $efectivo;

        return $this;
    }

    public function getResumen(): ?string
    {
        return $this->resumen;
    }

    public function setResumen(string $resumen): static
    {
        $this->resumen = $resumen;

        return $this;
    }
}
