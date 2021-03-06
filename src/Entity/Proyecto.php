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
     * @ORM\ManyToOne(targetEntity="App\Entity\Prof", inversedBy="proyectos")
     */
    private $prof;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Titulacion", inversedBy="proyectos")
     */
    private $titulacion;



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

    public function getProf(): ?prof
    {
        return $this->prof;
    }

    public function setProf(?prof $prof): self
    {
        $this->prof = $prof;

        return $this;
    }
    
    public function getTitulacion(): ?titulacion
    {
        return $this->titulacion;
    }

    public function setTitulacion(?titulacion $titulacion): self
    {
        $this->titulacion = $titulacion;

        return $this;
    }

    public function __toString()
    {
        return $this->getTitulo();
    }
    
}
