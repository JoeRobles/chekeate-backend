<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Molestia
 *
 * @ORM\Table(name="Molestia")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MolestiaRepository")
 */
class Molestia
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
     * @ORM\Column(name="nombre_molestia", type="string", length=255)
     */
    private $nombreMolestia;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_molestia", type="text", nullable=true)
     */
    private $descripcionMolestia;

    /**
     * @var string
     *
     * @ORM\Column(name="causas", type="text", nullable=true)
     */
    private $causas;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="text", nullable=true)
     */
    private $keywords;


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
     * Set nombreMolestia
     *
     * @param string $nombreMolestia
     * @return Molestia
     */
    public function setNombreMolestia($nombreMolestia)
    {
        $this->nombreMolestia = $nombreMolestia;

        return $this;
    }

    /**
     * Get nombreMolestia
     *
     * @return string 
     */
    public function getNombreMolestia()
    {
        return $this->nombreMolestia;
    }

    /**
     * Set descripcionMolestia
     *
     * @param string $descripcionMolestia
     * @return Molestia
     */
    public function setDescripcionMolestia($descripcionMolestia)
    {
        $this->descripcionMolestia = $descripcionMolestia;

        return $this;
    }

    /**
     * Get descripcionMolestia
     *
     * @return string 
     */
    public function getDescripcionMolestia()
    {
        return $this->descripcionMolestia;
    }

    /**
     * Set causas
     *
     * @param string $causas
     * @return Molestia
     */
    public function setCausas($causas)
    {
        $this->causas = $causas;

        return $this;
    }

    /**
     * Get causas
     *
     * @return string 
     */
    public function getCausas()
    {
        return $this->causas;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return Molestia
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
}
