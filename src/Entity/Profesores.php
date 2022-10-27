<?php

namespace App\Entity;

use App\Repository\ProfesoresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfesoresRepository::class)
 */
class Profesores
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
    private $id_profesor;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellido;

    /**
     * @ORM\OneToOne(targetEntity=Materia::class, mappedBy="relation", cascade={"persist", "remove"})
     */
    private $materia_has_profesor;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProfesor(): ?int
    {
        return $this->id_profesor;
    }

    public function setIdProfesor(int $id_profesor): self
    {
        $this->id_profesor = $id_profesor;

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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getMateriaHasProfesor(): ?Materia
    {
        return $this->materia_has_profesor;
    }

    public function setMateriaHasProfesor(?Materia $materia_has_profesor): self
    {
        // unset the owning side of the relation if necessary
        if ($materia_has_profesor === null && $this->materia_has_profesor !== null) {
            $this->materia_has_profesor->setRelation(null);
        }

        // set the owning side of the relation if necessary
        if ($materia_has_profesor !== null && $materia_has_profesor->getRelation() !== $this) {
            $materia_has_profesor->setRelation($this);
        }

        $this->materia_has_profesor = $materia_has_profesor;

        return $this;
    }
}
