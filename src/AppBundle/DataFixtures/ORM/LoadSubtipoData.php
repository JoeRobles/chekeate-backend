<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\DataFixtures\ORM\LoadAppData;
use AppBundle\Entity\Causa as Causa;

class LoadCausaData extends LoadAppData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $causas = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($causas['Causa'] as $reference => $columns)
        {
            $causa = new Causa();
            $causa->setNombreEnfermedad($columns['nombre_enfermedad']);
            $causa->setTipoCausa($columns['tipo_causa']);

            $manager->persist($causa);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Causa_'. $reference, $causa);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'causas';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 1;
    }
}