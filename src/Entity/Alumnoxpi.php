<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlumnoxpiRepository")
 */
class Alumnoxpi
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\pi")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idPI;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\alumno")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idAlumno;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPI(): ?pi
    {
        return $this->idPI;
    }

    public function setIdPI(?pi $idPI): self
    {
        $this->idPI = $idPI;

        return $this;
    }

    public function getIdAlumno(): ?alumno
    {
        return $this->idAlumno;
    }

    public function setIdAlumno(?alumno $idAlumno): self
    {
        $this->idAlumno = $idAlumno;

        return $this;
    }
}
