<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subtipo
 *
 * @ORM\Table(name="Subtipo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SubtipoRepository")
 */
class Subtipo
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
     * @ORM\Column(name="muestra", type="string", length=255)
     */
    private $muestra;

    /**
     * @var string
     *
     * @ORM\Column(name="unidades", type="string", length=255)
     */
    private $unidades;

    /**
     * @var float
     *
     * @ORM\Column(name="valorinferiorh", type="float")
     */
    private $valorinferiorh;

    /**
     * @var float
     *
     * @ORM\Column(name="valorsuperiorh", type="float")
     */
    private $valorsuperiorh;

    /**
     * @var float
     *
     * @ORM\Column(name="valorinferiorm", type="float")
     */
    private $valorinferiorm;

    /**
     * @var float
     *
     * @ORM\Column(name="valorsuperiorm", type="float")
     */
    private $valorsuperiorm;

    /**
     * @var string
     *
     * @ORM\Column(name="interpretacionvalorinferior", type="text")
     */
    private $interpretacionvalorinferior;

    /**
     * @var string
     *
     * @ORM\Column(name="interpretacionvalorsuperior", type="text")
     */
    private $interpretacionvalorsuperior;

    /**
     * @var string
     *
     * @ORM\Column(name="indicacion", type="string", length=255)
     */
    private $indicacion;


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
     * Set muestra
     *
     * @param string $muestra
     * @return Subtipo
     */
    public function setMuestra($muestra)
    {
        $this->muestra = $muestra;

        return $this;
    }

    /**
     * Get muestra
     *
     * @return string 
     */
    public function getMuestra()
    {
        return $this->muestra;
    }

    /**
     * Set unidades
     *
     * @param string $unidades
     * @return Subtipo
     */
    public function setUnidades($unidades)
    {
        $this->unidades = $unidades;

        return $this;
    }

    /**
     * Get unidades
     *
     * @return string 
     */
    public function getUnidades()
    {
        return $this->unidades;
    }

    /**
     * Set valorinferiorh
     *
     * @param float $valorinferiorh
     * @return Subtipo
     */
    public function setValorinferiorh($valorinferiorh)
    {
        $this->valorinferiorh = $valorinferiorh;

        return $this;
    }

    /**
     * Get valorinferiorh
     *
     * @return float 
     */
    public function getValorinferiorh()
    {
        return $this->valorinferiorh;
    }

    /**
     * Set valorsuperiorh
     *
     * @param float $valorsuperiorh
     * @return Subtipo
     */
    public function setValorsuperiorh($valorsuperiorh)
    {
        $this->valorsuperiorh = $valorsuperiorh;

        return $this;
    }

    /**
     * Get valorsuperiorh
     *
     * @return float 
     */
    public function getValorsuperiorh()
    {
        return $this->valorsuperiorh;
    }

    /**
     * Set valorinferiorm
     *
     * @param float $valorinferiorm
     * @return Subtipo
     */
    public function setValorinferiorm($valorinferiorm)
    {
        $this->valorinferiorm = $valorinferiorm;

        return $this;
    }

    /**
     * Get valorinferiorm
     *
     * @return float 
     */
    public function getValorinferiorm()
    {
        return $this->valorinferiorm;
    }

    /**
     * Set valorsuperiorm
     *
     * @param float $valorsuperiorm
     * @return Subtipo
     */
    public function setValorsuperiorm($valorsuperiorm)
    {
        $this->valorsuperiorm = $valorsuperiorm;

        return $this;
    }

    /**
     * Get valorsuperiorm
     *
     * @return float 
     */
    public function getValorsuperiorm()
    {
        return $this->valorsuperiorm;
    }

    /**
     * Set interpretacionvalorinferior
     *
     * @param string $interpretacionvalorinferior
     * @return Subtipo
     */
    public function setInterpretacionvalorinferior($interpretacionvalorinferior)
    {
        $this->interpretacionvalorinferior = $interpretacionvalorinferior;

        return $this;
    }

    /**
     * Get interpretacionvalorinferior
     *
     * @return string 
     */
    public function getInterpretacionvalorinferior()
    {
        return $this->interpretacionvalorinferior;
    }

    /**
     * Set interpretacionvalorsuperior
     *
     * @param string $interpretacionvalorsuperior
     * @return Subtipo
     */
    public function setInterpretacionvalorsuperior($interpretacionvalorsuperior)
    {
        $this->interpretacionvalorsuperior = $interpretacionvalorsuperior;

        return $this;
    }

    /**
     * Get interpretacionvalorsuperior
     *
     * @return string 
     */
    public function getInterpretacionvalorsuperior()
    {
        return $this->interpretacionvalorsuperior;
    }

    /**
     * Set indicacion
     *
     * @param string $indicacion
     * @return Subtipo
     */
    public function setIndicacion($indicacion)
    {
        $this->indicacion = $indicacion;

        return $this;
    }

    /**
     * Get indicacion
     *
     * @return string 
     */
    public function getIndicacion()
    {
        return $this->indicacion;
    }
}
