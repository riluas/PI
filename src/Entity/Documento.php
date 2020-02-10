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
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $formato;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\pi", inversedBy="documentos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $idPi;

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

    public function getFormato(): ?string
    {
        return $this->formato;
    }

    public function setFormato(string $formato): self
    {
        $this->formato = $formato;

        return $this;
    }

    public function getIdPi(): ?pi
    {
        return $this->idPi;
    }

    public function setIdPi(?pi $idPi): self
    {
        $this->idPi = $idPi;

        return $this;
    }
}
