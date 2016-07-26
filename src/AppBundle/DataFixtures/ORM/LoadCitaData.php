<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\DataFixtures\ORM\LoadAppData;
use AppBundle\Entity\Cita as Cita;
use Symfony\Component\Validator\Constraints\DateTime;

class LoadCitaData extends LoadAppData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $citas = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($citas['Cita'] as $reference => $columns)
        {
            $cita = new Cita();
            $cita->setPrecioServicio($columns['precio_servicio']);
            $cita->setNombrePersona($columns['nombre_persona']);

            $date = gmdate('Y-m-d H:i:s', strtotime($columns['fecha_nacimiento_persona']));
            $fecha_nacimiento_persona = new \DateTime($date);
            $cita->setFechaNacimientoPersona($fecha_nacimiento_persona);

            $cita->setSexoPersona($columns['sexo_persona']);
            $cita->setCorreoPersona($columns['correo_persona']);
            $cita->setTelefonoPersona($columns['telefono_persona']);
            $cita->setNombreImagen($columns['nombre_imagen']);
            $cita->setEstadoCita($columns['estado_cita']);

            $date = gmdate('Y-m-d H:i:s', strtotime($columns['fecha_reserva']));
            $fecha_reserva = new \DateTime($date);
            $cita->setFechaReserva($fecha_reserva);

            $date = gmdate('Y-m-d H:i:s', strtotime($columns['fecha_creacion']));
            $fecha_creacion = new \DateTime($date);
            $cita->setFechaCreacion($fecha_creacion);

            $cita->setServicio($manager->merge($this->getReference('Servicio_' . $columns['servicio'])));

            $manager->persist($cita);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Cita_'. $reference, $cita);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'citas';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 6;
    }
}