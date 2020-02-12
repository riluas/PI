<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProyectoRepository")
 */
class Proyecto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $curso_escolar;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $profesor_responsable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Alumnoxpi", mappedBy="pi_id")
     */
    private $alumnoxpis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Documento", mappedBy="pi_id")
     */
    private $documentos;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Titulacion", mappedBy="pi_id")
     */
    private $titulacions;

    public function __construct()
    {
        $this->alumnoxpis = new ArrayCollection();
        $this->documentos = new ArrayCollection();
        $this->titulacions = new ArrayCollection();
    }


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

    public function getCursoEscolar(): ?string
    {
        return $this->curso_escolar;
    }

    public function setCursoEscolar(string $curso_escolar): self
    {
        $this->curso_escolar = $curso_escolar;

        return $this;
    }

    public function getProfesorResponsable(): ?string
    {
        return $this->profesor_responsable;
    }

    public function setProfesorResponsable(string $profesor_responsable): self
    {
        $this->profesor_responsable = $profesor_responsable;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

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
            $alumnoxpi->setPiId($this);
        }

        return $this;
    }

    public function removeAlumnoxpi(Alumnoxpi $alumnoxpi): self
    {
        if ($this->alumnoxpis->contains($alumnoxpi)) {
            $this->alumnoxpis->removeElement($alumnoxpi);
            // set the owning side to null (unless already changed)
            if ($alumnoxpi->getPiId() === $this) {
                $alumnoxpi->setPiId(null);
            }
        }

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
            $documento->setPiId($this);
        }

        return $this;
    }

    public function removeDocumento(Documento $documento): self
    {
        if ($this->documentos->contains($documento)) {
            $this->documentos->removeElement($documento);
            // set the owning side to null (unless already changed)
            if ($documento->getPiId() === $this) {
                $documento->setPiId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Titulacion[]
     */
    public function getTitulacions(): Collection
    {
        return $this->titulacions;
    }

    public function addTitulacion(Titulacion $titulacion): self
    {
        if (!$this->titulacions->contains($titulacion)) {
            $this->titulacions[] = $titulacion;
            $titulacion->setPiId($this);
        }

        return $this;
    }

    public function removeTitulacion(Titulacion $titulacion): self
    {
        if ($this->titulacions->contains($titulacion)) {
            $this->titulacions->removeElement($titulacion);
            // set the owning side to null (unless already changed)
            if ($titulacion->getPiId() === $this) {
                $titulacion->setPiId(null);
            }
        }

        return $this;
    }

}
