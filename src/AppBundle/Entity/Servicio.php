<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Servicio
 *
 * @ORM\Table(name="Servicio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServicioRepository")
 */
class Servicio
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
     * @ORM\OneToMany(targetEntity="Precio", mappedBy="servicio")
     */
    protected $precios;

    /**
     * @ORM\OneToMany(targetEntity="UserLocation", mappedBy="servicio")
     */
    protected $userLocations;

    /**
     * @ORM\OneToMany(targetEntity="Subtipo", mappedBy="servicio")
     */
    protected $subtipos;

    /**
     * @ORM\OneToMany(targetEntity="Cita", mappedBy="servicio")
     */
    protected $citas;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=255, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="text", nullable=true)
     */
    private $keywords;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->precios = new ArrayCollection();
        $this->userLocations = new ArrayCollection();
        $this->subtipos = new ArrayCollection();
        $this->citas = new ArrayCollection();
    }

    /**
     * Magic method
     */
    public function __toString()
    {
        return $this->nombre;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Servicio
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Servicio
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
     * Set tipo
     *
     * @param string $tipo
     * @return Servicio
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return Servicio
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Add precios
     *
     * @param \AppBundle\Entity\Precio $precios
     * @return Servicio
     */
    public function addPrecio(\AppBundle\Entity\Precio $precios)
    {
        $this->precios[] = $precios;

        return $this;
    }

    /**
     * Remove precios
     *
     * @param \AppBundle\Entity\Precio $precios
     */
    public function removePrecio(\AppBundle\Entity\Precio $precios)
    {
        $this->precios->removeElement($precios);
    }

    /**
     * Get precios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrecios()
    {
        return $this->precios;
    }

    /**
     * Add userLocations
     *
     * @param \AppBundle\Entity\UserLocation $userLocations
     * @return Servicio
     */
    public function addUserLocation(\AppBundle\Entity\UserLocation $userLocations)
    {
        $this->userLocations[] = $userLocations;

        return $this;
    }

    /**
     * Remove userLocations
     *
     * @param \AppBundle\Entity\UserLocation $userLocations
     */
    public function removeUserLocation(\AppBundle\Entity\UserLocation $userLocations)
    {
        $this->userLocations->removeElement($userLocations);
    }

    /**
     * Get userLocations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserLocations()
    {
        return $this->userLocations;
    }

    /**
     * Add subtipos
     *
     * @param \AppBundle\Entity\Subtipo $subtipos
     * @return Servicio
     */
    public function addSubtipo(\AppBundle\Entity\Subtipo $subtipos)
    {
        $this->subtipos[] = $subtipos;

        return $this;
    }

    /**
     * Remove subtipos
     *
     * @param \AppBundle\Entity\Subtipo $subtipos
     */
    public function removeSubtipo(\AppBundle\Entity\Subtipo $subtipos)
    {
        $this->subtipos->removeElement($subtipos);
    }

    /**
     * Get subtipos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubtipos()
    {
        return $this->subtipos;
    }

    /**
     * Add citas
     *
     * @param \AppBundle\Entity\Cita $citas
     * @return Servicio
     */
    public function addCita(\AppBundle\Entity\Cita $citas)
    {
        $this->citas[] = $citas;

        return $this;
    }

    /**
     * Remove citas
     *
     * @param \AppBundle\Entity\Cita $citas
     */
    public function removeCita(\AppBundle\Entity\Cita $citas)
    {
        $this->citas->removeElement($citas);
    }

    /**
     * Get citas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCitas()
    {
        return $this->citas;
    }
}
