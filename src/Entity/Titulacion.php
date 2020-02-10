<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TitulacionRepository")
 */
class Titulacion
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
    private $titulo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $curso;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pi", inversedBy="idTitulacion")
     */
    private $pi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getCurso(): ?string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): self
    {
        $this->curso = $curso;

        return $this;
    }

    public function getPi(): ?Pi
    {
        return $this->pi;
    }

    public function setPi(?Pi $pi): self
    {
        $this->pi = $pi;

        return $this;
    }
}
