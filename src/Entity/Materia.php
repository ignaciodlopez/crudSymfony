<?php

namespace App\Entity;

use App\Repository\MateriaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MateriaRepository::class)
 */
class Materia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_materia;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\OneToOne(targetEntity=profesores::class, inversedBy="materia_has_profesor", cascade={"persist", "remove"})
     */
    private $relation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMateria(): ?int
    {
        return $this->id_materia;
    }

    public function setIdMateria(int $id_materia): self
    {
        $this->id_materia = $id_materia;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getRelation(): ?profesores
    {
        return $this->relation;
    }

    public function setRelation(?profesores $relation): self
    {
        $this->relation = $relation;

        return $this;
    }
}
