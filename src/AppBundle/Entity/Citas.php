<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Citas
 *
 * @ORM\Table(name="Citas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CitasRepository")
 */
class Citas
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
     * @var float
     *
     * @ORM\Column(name="precio_servicio", type="float")
     */
    private $precioServicio;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_persona", type="string", length=255)
     */
    private $nombrePersona;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento_ppersona", type="date", nullable=true)
     */
    private $fechaNacimientoPpersona;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo_persona", type="string", length=9)
     */
    private $sexoPersona;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_persona", type="string", length=255, nullable=true)
     */
    private $correoPersona;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_persona", type="string", length=100, nullable=true)
     */
    private $telefonoPersona;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_imagen", type="string", length=255, nullable=true)
     */
    private $nombreImagen;

    /**
     * @var int
     *
     * @ORM\Column(name="estado_cita", type="smallint")
     */
    private $estadoCita;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_reserva", type="datetime")
     */
    private $fechaReserva;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_creacion", type="datetime")
     */
    private $fechaCreacion;


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
     * Set precioServicio
     *
     * @param float $precioServicio
     * @return Citas
     */
    public function setPrecioServicio($precioServicio)
    {
        $this->precioServicio = $precioServicio;

        return $this;
    }

    /**
     * Get precioServicio
     *
     * @return float 
     */
    public function getPrecioServicio()
    {
        return $this->precioServicio;
    }

    /**
     * Set nombrePersona
     *
     * @param string $nombrePersona
     * @return Citas
     */
    public function setNombrePersona($nombrePersona)
    {
        $this->nombrePersona = $nombrePersona;

        return $this;
    }

    /**
     * Get nombrePersona
     *
     * @return string 
     */
    public function getNombrePersona()
    {
        return $this->nombrePersona;
    }

    /**
     * Set fechaNacimientoPpersona
     *
     * @param \DateTime $fechaNacimientoPpersona
     * @return Citas
     */
    public function setFechaNacimientoPpersona($fechaNacimientoPpersona)
    {
        $this->fechaNacimientoPpersona = $fechaNacimientoPpersona;

        return $this;
    }

    /**
     * Get fechaNacimientoPpersona
     *
     * @return \DateTime 
     */
    public function getFechaNacimientoPpersona()
    {
        return $this->fechaNacimientoPpersona;
    }

    /**
     * Set sexoPersona
     *
     * @param string $sexoPersona
     * @return Citas
     */
    public function setSexoPersona($sexoPersona)
    {
        $this->sexoPersona = $sexoPersona;

        return $this;
    }

    /**
     * Get sexoPersona
     *
     * @return string 
     */
    public function getSexoPersona()
    {
        return $this->sexoPersona;
    }

    /**
     * Set correoPersona
     *
     * @param string $correoPersona
     * @return Citas
     */
    public function setCorreoPersona($correoPersona)
    {
        $this->correoPersona = $correoPersona;

        return $this;
    }

    /**
     * Get correoPersona
     *
     * @return string 
     */
    public function getCorreoPersona()
    {
        return $this->correoPersona;
    }

    /**
     * Set telefonoPersona
     *
     * @param string $telefonoPersona
     * @return Citas
     */
    public function setTelefonoPersona($telefonoPersona)
    {
        $this->telefonoPersona = $telefonoPersona;

        return $this;
    }

    /**
     * Get telefonoPersona
     *
     * @return string 
     */
    public function getTelefonoPersona()
    {
        return $this->telefonoPersona;
    }

    /**
     * Set nombreImagen
     *
     * @param string $nombreImagen
     * @return Citas
     */
    public function setNombreImagen($nombreImagen)
    {
        $this->nombreImagen = $nombreImagen;

        return $this;
    }

    /**
     * Get nombreImagen
     *
     * @return string 
     */
    public function getNombreImagen()
    {
        return $this->nombreImagen;
    }

    /**
     * Set estadoCita
     *
     * @param integer $estadoCita
     * @return Citas
     */
    public function setEstadoCita($estadoCita)
    {
        $this->estadoCita = $estadoCita;

        return $this;
    }

    /**
     * Get estadoCita
     *
     * @return integer 
     */
    public function getEstadoCita()
    {
        return $this->estadoCita;
    }

    /**
     * Set fechaReserva
     *
     * @param \DateTime $fechaReserva
     * @return Citas
     */
    public function setFechaReserva($fechaReserva)
    {
        $this->fechaReserva = $fechaReserva;

        return $this;
    }

    /**
     * Get fechaReserva
     *
     * @return \DateTime 
     */
    public function getFechaReserva()
    {
        return $this->fechaReserva;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return Citas
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }
}
