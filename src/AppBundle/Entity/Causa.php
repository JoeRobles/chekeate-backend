<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Causa
 *
 * @ORM\Table(name="Causa")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CausaRepository")
 */
class Causa
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
     * @ORM\Column(name="nombre_enfermedad", type="text")
     */
    private $nombreEnfermedad;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_causa", type="text")
     */
    private $tipoCausa;


    /**
     * Object to string
     */
    public function __toString()
    {
        return $this->nombreEnfermedad;
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
     * Set nombreEnfermedad
     *
     * @param string $nombreEnfermedad
     * @return Causa
     */
    public function setNombreEnfermedad($nombreEnfermedad)
    {
        $this->nombreEnfermedad = $nombreEnfermedad;

        return $this;
    }

    /**
     * Get nombreEnfermedad
     *
     * @return string 
     */
    public function getNombreEnfermedad()
    {
        return $this->nombreEnfermedad;
    }

    /**
     * Set tipoCausa
     *
     * @param string $tipoCausa
     * @return Causa
     */
    public function setTipoCausa($tipoCausa)
    {
        $this->tipoCausa = $tipoCausa;

        return $this;
    }

    /**
     * Get tipoCausa
     *
     * @return string 
     */
    public function getTipoCausa()
    {
        return $this->tipoCausa;
    }

}
