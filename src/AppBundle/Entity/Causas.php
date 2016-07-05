<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Causas
 *
 * @ORM\Table(name="Causas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CausasRepository")
 */
class Causas
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
     * @return Causas
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
     * @return Causas
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
