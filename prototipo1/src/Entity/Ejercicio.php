<?php

namespace App\Entity;

use App\Repository\EjercicioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EjercicioRepository::class)]
class Ejercicio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombreEjercicio = null;

    #[ORM\Column(length: 255)]
    private ?string $descripcion = null;

    #[ORM\ManyToOne]
    private ?Maquina $maquina = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?GrupoMuscular $grupoMuscular = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreEjercicio(): ?string
    {
        return $this->nombreEjercicio;
    }

    public function setNombreEjercicio(string $nombreEjercicio): static
    {
        $this->nombreEjercicio = $nombreEjercicio;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): static
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getMaquina(): ?Maquina
    {
        return $this->maquina;
    }

    public function setMaquina(?Maquina $maquina): static
    {
        $this->maquina = $maquina;

        return $this;
    }

    public function getGrupoMuscular(): ?GrupoMuscular
    {
        return $this->grupoMuscular;
    }

    public function setGrupoMuscular(?GrupoMuscular $grupoMuscular): static
    {
        $this->grupoMuscular = $grupoMuscular;

        return $this;
    }
}
