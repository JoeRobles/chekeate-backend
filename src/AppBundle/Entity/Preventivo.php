<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preventivo
 *
 * @ORM\Table(name="Preventivo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PreventivoRepository")
 */
class Preventivo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="Servicio")
     * @ORM\JoinTable(name="PreventivosServicios",
     *      joinColumns={@ORM\JoinColumn(name="preventivo_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="servicio_id", referencedColumnName="id")}
     *      )
     */
    protected $servicios;

    /**
     * @var string
     *
     * @ORM\Column(name="enfermedad", type="string", length=255)
     */
    private $enfermedad;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="grupo_riesgo", type="string", length=255, nullable=true)
     */
    private $grupoRiesgo;

    /**
     * @var string
     *
     * @ORM\Column(name="recomendacion", type="text", nullable=true)
     */
    private $recomendacion;
    

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->servicios = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set enfermedad
     *
     * @param string $enfermedad
     * @return Preventivo
     */
    public function setEnfermedad($enfermedad)
    {
        $this->enfermedad = $enfermedad;

        return $this;
    }

    /**
     * Get enfermedad
     *
     * @return string 
     */
    public function getEnfermedad()
    {
        return $this->enfermedad;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Preventivo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set grupoRiesgo
     *
     * @param string $grupoRiesgo
     * @return Preventivo
     */
    public function setGrupoRiesgo($grupoRiesgo)
    {
        $this->grupoRiesgo = $grupoRiesgo;

        return $this;
    }

    /**
     * Get grupoRiesgo
     *
     * @return string 
     */
    public function getGrupoRiesgo()
    {
        return $this->grupoRiesgo;
    }

    /**
     * Set recomendacion
     *
     * @param string $recomendacion
     * @return Preventivo
     */
    public function setRecomendacion($recomendacion)
    {
        $this->recomendacion = $recomendacion;

        return $this;
    }

    /**
     * Get recomendacion
     *
     * @return string
     */
    public function getRecomendacion()
    {
        return $this->recomendacion;
    }

    /**
     * Add servicios
     *
     * @param \AppBundle\Entity\Servicio $servicios
     * @return Preventivo
     */
    public function addServicio(\AppBundle\Entity\Servicio $servicios)
    {
        $this->servicios[] = $servicios;

        return $this;
    }

    /**
     * Remove servicios
     *
     * @param \AppBundle\Entity\Servicio $servicios
     */
    public function removeServicio(\AppBundle\Entity\Servicio $servicios)
    {
        $this->servicios->removeElement($servicios);
    }

    /**
     * Get servicios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServicios()
    {
        return $this->servicios;
    }
}
