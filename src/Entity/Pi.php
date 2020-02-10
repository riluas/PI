<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PiRepository")
 */
class Pi
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
    private $cursoEscolar;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $profesorResponsable;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $descripcion;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Documento", mappedBy="idPi")
     */
    private $documentos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\titulacion", mappedBy="pi")
     */
    private $idTitulacion;


    public function __construct()
    {
        $this->documentos = new ArrayCollection();
        $this->idTitulacion = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getCursoEscolar(): ?string
    {
        return $this->cursoEscolar;
    }

    public function setCursoEscolar(string $cursoEscolar): self
    {
        $this->cursoEscolar = $cursoEscolar;

        return $this;
    }

    public function getProfesorResponsable(): ?string
    {
        return $this->profesorResponsable;
    }

    public function setProfesorResponsable(string $profesorResponsable): self
    {
        $this->profesorResponsable = $profesorResponsable;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }


    /**
     * @return Collection|Documento[]
     */
    public function getDocumentos(): Collection
    {
        return $this->documentos;
    }

    public function addDocumento(Documento $documento): self
    {
        if (!$this->documentos->contains($documento)) {
            $this->documentos[] = $documento;
            $documento->setIdPi($this);
        }

        return $this;
    }

    public function removeDocumento(Documento $documento): self
    {
        if ($this->documentos->contains($documento)) {
            $this->documentos->removeElement($documento);
            // set the owning side to null (unless already changed)
            if ($documento->getIdPi() === $this) {
                $documento->setIdPi(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|titulacion[]
     */
    public function getIdTitulacion(): Collection
    {
        return $this->idTitulacion;
    }

    public function addIdTitulacion(titulacion $idTitulacion): self
    {
        if (!$this->idTitulacion->contains($idTitulacion)) {
            $this->idTitulacion[] = $idTitulacion;
            $idTitulacion->setPi($this);
        }

        return $this;
    }

    public function removeIdTitulacion(titulacion $idTitulacion): self
    {
        if ($this->idTitulacion->contains($idTitulacion)) {
            $this->idTitulacion->removeElement($idTitulacion);
            // set the owning side to null (unless already changed)
            if ($idTitulacion->getPi() === $this) {
                $idTitulacion->setPi(null);
            }
        }

        return $this;
    }

}
