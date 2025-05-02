<?php

namespace App\Entity;

use App\Repository\DetalleRutinaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetalleRutinaRepository::class)]
class DetalleRutina
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Rutina $rutina = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ejercicio $ejercicio = null;

    #[ORM\Column]
    private ?int $peso = null;

    #[ORM\Column]
    private ?int $series = null;

    #[ORM\Column]
    private ?int $repeticionesPorSerie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRutina(): ?Rutina
    {
        return $this->rutina;
    }

    public function setRutina(?Rutina $rutina): static
    {
        $this->rutina = $rutina;

        return $this;
    }

    public function getEjercicio(): ?Ejercicio
    {
        return $this->ejercicio;
    }

    public function setEjercicio(?Ejercicio $ejercicio): static
    {
        $this->ejercicio = $ejercicio;

        return $this;
    }

    public function getPeso(): ?int
    {
        return $this->peso;
    }

    public function setPeso(int $peso): static
    {
        $this->peso = $peso;

        return $this;
    }

    public function getSeries(): ?int
    {
        return $this->series;
    }

    public function setSeries(int $series): static
    {
        $this->series = $series;

        return $this;
    }

    public function getRepeticionesPorSerie(): ?int
    {
        return $this->repeticionesPorSerie;
    }

    public function setRepeticionesPorSerie(int $repeticionesPorSerie): static
    {
        $this->repeticionesPorSerie = $repeticionesPorSerie;

        return $this;
    }
}
