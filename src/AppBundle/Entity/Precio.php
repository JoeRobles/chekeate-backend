<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Precio
 *
 * @ORM\Table(name="Precio")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PrecioRepository")
 */
class Precio
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
     * @ORM\ManyToOne(targetEntity="Centro", inversedBy="precios")
     * @ORM\JoinColumn(name="centro_id", referencedColumnName="id")
     */
    protected $centro;

    /**
     * @ORM\ManyToOne(targetEntity="Servicio", inversedBy="precios")
     * @ORM\JoinColumn(name="servicio_id", referencedColumnName="id")
     */
    protected $servicio;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float")
     */
    private $precio;

    /**
     * @var int
     *
     * @ORM\Column(name="compra", type="smallint", nullable=true)
     */
    private $compra;


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
     * Set precio
     *
     * @param float $precio
     * @return Precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set compra
     *
     * @param integer $compra
     * @return Precio
     */
    public function setCompra($compra)
    {
        $this->compra = $compra;

        return $this;
    }

    /**
     * Get compra
     *
     * @return integer 
     */
    public function getCompra()
    {
        return $this->compra;
    }

    /**
     * Set centro
     *
     * @param \AppBundle\Entity\Centro $centro
     * @return Precio
     */
    public function setCentro(\AppBundle\Entity\Centro $centro = null)
    {
        $this->centro = $centro;

        return $this;
    }

    /**
     * Get centro
     *
     * @return \AppBundle\Entity\Centro 
     */
    public function getCentro()
    {
        return $this->centro;
    }

    /**
     * Set servicio
     *
     * @param \AppBundle\Entity\Servicio $servicio
     * @return Precio
     */
    public function setServicio(\AppBundle\Entity\Servicio $servicio = null)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return \AppBundle\Entity\Servicio 
     */
    public function getServicio()
    {
        return $this->servicio;
    }
}
