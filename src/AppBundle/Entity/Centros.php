<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Centros
 *
 * @ORM\Table(name="Centros")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CentrosRepository")
 */
class Centros
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
     * @ORM\Column(name="linkwebsite", type="string", length=255, nullable=true, unique=true)
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
     * @return Centros
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
     * @return Centros
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
     * @return Centros
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
     * @return Centros
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
     * @return Centros
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
     * @return Centros
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
     * @return Centros
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
     * @return Centros
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
}
