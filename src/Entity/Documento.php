<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DocumentoRepository")
 */
class Documento
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Proyecto", inversedBy="documentos")
     */
    private $pi_id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $formato;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPiId(): ?proyecto
    {
        return $this->pi_id;
    }

    public function setPiId(?proyecto $pi_id): self
    {
        $this->pi_id = $pi_id;

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

    public function getFormato(): ?string
    {
        return $this->formato;
    }

    public function setFormato(string $formato): self
    {
        $this->formato = $formato;

        return $this;
    }

    /* public function __toString()
    {
        return $this->getNombre();
    } */
}
