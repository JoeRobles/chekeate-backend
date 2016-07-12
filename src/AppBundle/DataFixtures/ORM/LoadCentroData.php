<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\DataFixtures\ORM\LoadAppData;
use AppBundle\Entity\Centro as Centro;

class LoadCentroData extends LoadAppData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $centros = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($centros['Centro'] as $reference => $columns)
        {
            $centro = new Centro();
            $centro->setNombre($columns['nombre']);
            $centro->setDireccion($columns['direccion']);
            $centro->setTelefono($columns['telefono']);
            $centro->setHorarioatencion($columns['horarioatencion']);
            $centro->setLinkwebsite($columns['linkwebsite']);
            $centro->setImagen($columns['imagen']);
            $centro->setLatitud($columns['latitud']);
            $centro->setLongitud($columns['longitud']);

            $manager->persist($centro);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Centro_'. $reference, $centro);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'centros';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 4;
    }
}