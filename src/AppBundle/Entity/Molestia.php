<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

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
     * @ORM\ManyToMany(targetEntity="Causa")
     * @ORM\JoinTable(name="MolestiasCausas",
     *      joinColumns={@ORM\JoinColumn(name="molestia_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="causa_id", referencedColumnName="id")}
     *      )
     */
    protected $causas;

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
     * @ORM\Column(name="keywords", type="text", nullable=true)
     */
    private $keywords;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->causas = new ArrayCollection();
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
     * @return Molestia
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
     * @return Molestia
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

    /**
     * Add causas
     *
     * @param \AppBundle\Entity\Causa $causas
     * @return Molestia
     */
    public function addCausa(\AppBundle\Entity\Causa $causas)
    {
        $this->causas[] = $causas;

        return $this;
    }

    /**
     * Remove causas
     *
     * @param \AppBundle\Entity\Causa $causas
     */
    public function removeCausa(\AppBundle\Entity\Causa $causas)
    {
        $this->causas->removeElement($causas);
    }

    /**
     * Get causas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCausas()
    {
        return $this->causas;
    }
}
