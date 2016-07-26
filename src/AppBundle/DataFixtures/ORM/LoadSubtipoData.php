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
            $subtipo->setValorinferiorh($columns['valor_inferior_h']);
            $subtipo->setValorsuperiorh($columns['valor_superior_h']);
            $subtipo->setValorinferiorm($columns['valor_inferior_m']);
            $subtipo->setValorsuperiorm($columns['valor_superior_m']);
            $subtipo->setInterpretacionvalorinferior($columns['interpretacion_valor_inferior']);
            $subtipo->setInterpretacionvalorsuperior($columns['interpretacion_valor_superior']);
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