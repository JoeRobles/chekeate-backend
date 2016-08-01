<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Centro
 *
 * @ORM\Table(name="Centro")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CentroRepository")
 */
class Centro
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
     * @ORM\OneToMany(targetEntity="Precio", mappedBy="centro")
     */
    protected $precios;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=50)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="horarioatencion", type="string", length=255)
     */
    private $horarioatencion;

    /**
     * @var string
     *
     * @ORM\Column(name="linkwebsite", type="string", length=255, nullable=true)
     */
    private $linkwebsite;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=true)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="latitud", type="decimal", precision=18, scale=12, nullable=true)
     */
    private $latitud;

    /**
     * @var string
     *
     * @ORM\Column(name="longitud", type="decimal", precision=18, scale=12, nullable=true)
     */
    private $longitud;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->precios = new ArrayCollection();
    }

    /**
     * Magic Method
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
     * @return Centro
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
     * Set direccion
     *
     * @param string $direccion
     * @return Centro
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Centro
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set horarioatencion
     *
     * @param string $horarioatencion
     * @return Centro
     */
    public function setHorarioatencion($horarioatencion)
    {
        $this->horarioatencion = $horarioatencion;

        return $this;
    }

    /**
     * Get horarioatencion
     *
     * @return string 
     */
    public function getHorarioatencion()
    {
        return $this->horarioatencion;
    }

    /**
     * Set linkwebsite
     *
     * @param string $linkwebsite
     * @return Centro
     */
    public function setLinkwebsite($linkwebsite)
    {
        $this->linkwebsite = $linkwebsite;

        return $this;
    }

    /**
     * Get linkwebsite
     *
     * @return string 
     */
    public function getLinkwebsite()
    {
        return $this->linkwebsite;
    }

    /**
     * Set imagen
     *
     * @param string $imagen
     * @return Centro
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get imagen
     *
     * @return string 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set latitud
     *
     * @param string $latitud
     * @return Centro
     */
    public function setLatitud($latitud)
    {
        $this->latitud = $latitud;

        return $this;
    }

    /**
     * Get latitud
     *
     * @return string 
     */
    public function getLatitud()
    {
        return $this->latitud;
    }

    /**
     * Set longitud
     *
     * @param string $longitud
     * @return Centro
     */
    public function setLongitud($longitud)
    {
        $this->longitud = $longitud;

        return $this;
    }

    /**
     * Get longitud
     *
     * @return string 
     */
    public function getLongitud()
    {
        return $this->longitud;
    }

    /**
     * Add precios
     *
     * @param \AppBundle\Entity\Precio $precios
     * @return Centro
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
}
