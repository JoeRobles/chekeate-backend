<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\DataFixtures\ORM\LoadAppData;
use AppBundle\Entity\Servicio as Servicio;

class LoadServicioData extends LoadAppData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $servicios = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($servicios['Servicio'] as $reference => $columns)
        {
            $servicio = new Servicio();
            $servicio->setNombre($columns['nombre']);
            $servicio->setDescripcion($columns['descripcion']);
            $servicio->setTipo($columns['tipo']);
            $servicio->setKeywords($columns['keywords']);

            $manager->persist($servicio);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Servicio_'. $reference, $servicio);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'servicios';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 3;
    }
}