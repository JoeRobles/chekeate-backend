<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\DataFixtures\ORM\LoadAppData;
use AppBundle\Entity\Molestia as Molestia;

class LoadMolestiaData extends LoadAppData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $molestias = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($molestias['Molestia'] as $reference => $columns)
        {
            $molestia = new Molestia();
            $molestia->setNombre($columns['nombre']);
            $molestia->setDescripcion($columns['descripcion']);
            foreach ($columns['causas'] as $causa) {
                $molestia->addCausa($manager->merge($this->getReference('Causa_' . $causa)));
            }
            $molestia->setKeywords($columns['keywords']);

            $manager->persist($molestia);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Molestia'. $reference, $molestia);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'molestias';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 2;
    }
}