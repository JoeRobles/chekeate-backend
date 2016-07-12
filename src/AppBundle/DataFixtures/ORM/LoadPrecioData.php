<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\DataFixtures\ORM\LoadAppData;
use AppBundle\Entity\Precio as Precio;

class LoadPrecioData extends LoadAppData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $precios = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($precios['Precio'] as $reference => $columns)
        {
            $precio = new Precio();
            $precio->setPrecio($columns['precio']);
            $precio->setCompra($columns['compra']);
            $precio->setServicio($manager->merge($this->getReference('Servicio_' . $columns['servicio'])));
            $precio->setCentro($manager->merge($this->getReference('Centro_' . $columns['centro'])));

            $manager->persist($precio);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Precio_'. $reference, $precio);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'precios';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 5;
    }
}