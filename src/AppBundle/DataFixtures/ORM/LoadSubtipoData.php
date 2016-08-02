<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\DataFixtures\ORM\LoadAppData;
use AppBundle\Entity\Subtipo as Subtipo;

class LoadSubtipoData extends LoadAppData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $subtipos = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($subtipos['Subtipo'] as $reference => $columns)
        {
            $subtipo = new Subtipo();
            $subtipo->setServicio($manager->merge($this->getReference('Servicio_' . $columns['servicio'])));
            $subtipo->setMuestra($columns['muestra']);
            $subtipo->setUnidades($columns['unidades']);
            $subtipo->setValorinferiorh($columns['valorinferiorh']);
            $subtipo->setValorsuperiorh($columns['valorsuperiorh']);
            $subtipo->setValorinferiorm($columns['valorinferiorm']);
            $subtipo->setValorsuperiorm($columns['valorsuperiorm']);
            $subtipo->setInterpretacionvalorinferior($columns['interpretacionvalorinferior']);
            $subtipo->setInterpretacionvalorsuperior($columns['interpretacionvalorsuperior']);
            $subtipo->setIndicacion($columns['indicacion']);

            $manager->persist($subtipo);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Subtipo_'. $reference, $subtipo);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'subtipos';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 8;
    }
}