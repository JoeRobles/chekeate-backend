<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Preventivos
 *
 * @ORM\Table(name="Preventivos")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PreventivosRepository")
 */
class Preventivos
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
     * @ORM\Column(name="enfermedad_preventivo", type="string", length=255)
     */
    private $enfermedadPreventivo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_preventivo", type="text", nullable=true)
     */
    private $descripcionPreventivo;

    /**
     * @var string
     *
     * @ORM\Column(name="grupo_riesgo_preventivo", type="string", length=255, nullable=true)
     */
    private $grupoRiesgoPreventivo;

    /**
     * @var string
     *
     * @ORM\Column(name="recomendacion", type="text", nullable=true)
     */
    private $recomendacion;


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
     * Set enfermedadPreventivo
     *
     * @param string $enfermedadPreventivo
     * @return Preventivos
     */
    public function setEnfermedadPreventivo($enfermedadPreventivo)
    {
        $this->enfermedadPreventivo = $enfermedadPreventivo;

        return $this;
    }

    /**
     * Get enfermedadPreventivo
     *
     * @return string 
     */
    public function getEnfermedadPreventivo()
    {
        return $this->enfermedadPreventivo;
    }

    /**
     * Set descripcionPreventivo
     *
     * @param string $descripcionPreventivo
     * @return Preventivos
     */
    public function setDescripcionPreventivo($descripcionPreventivo)
    {
        $this->descripcionPreventivo = $descripcionPreventivo;

        return $this;
    }

    /**
     * Get descripcionPreventivo
     *
     * @return string 
     */
    public function getDescripcionPreventivo()
    {
        return $this->descripcionPreventivo;
    }

    /**
     * Set grupoRiesgoPreventivo
     *
     * @param string $grupoRiesgoPreventivo
     * @return Preventivos
     */
    public function setGrupoRiesgoPreventivo($grupoRiesgoPreventivo)
    {
        $this->grupoRiesgoPreventivo = $grupoRiesgoPreventivo;

        return $this;
    }

    /**
     * Get grupoRiesgoPreventivo
     *
     * @return string 
     */
    public function getGrupoRiesgoPreventivo()
    {
        return $this->grupoRiesgoPreventivo;
    }

    /**
     * Set recomendacion
     *
     * @param string $recomendacion
     * @return Preventivos
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
}
