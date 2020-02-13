<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlumnoRepository")
 */
class Alumno
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $apellidos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Alumnoxpi", mappedBy="alumno_id")
     */
    private $alumnoxpis;

    public function __construct()
    {
        $this->alumnoxpis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * @return Collection|Alumnoxpi[]
     */
    public function getAlumnoxpis(): Collection
    {
        return $this->alumnoxpis;
    }

    public function addAlumnoxpi(Alumnoxpi $alumnoxpi): self
    {
        if (!$this->alumnoxpis->contains($alumnoxpi)) {
            $this->alumnoxpis[] = $alumnoxpi;
            $alumnoxpi->setAlumnoId($this);
        }

        return $this;
    }

    public function removeAlumnoxpi(Alumnoxpi $alumnoxpi): self
    {
        if ($this->alumnoxpis->contains($alumnoxpi)) {
            $this->alumnoxpis->removeElement($alumnoxpi);
            // set the owning side to null (unless already changed)
            if ($alumnoxpi->getAlumnoId() === $this) {
                $alumnoxpi->setAlumnoId(null);
            }
        }

        return $this;
    }
}
