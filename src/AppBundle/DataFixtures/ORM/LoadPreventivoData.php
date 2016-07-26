<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\DataFixtures\ORM\LoadAppData;
use AppBundle\Entity\Preventivo as Preventivo;

class LoadPreventivoData extends LoadAppData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $preventivos = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($preventivos['Preventivo'] as $reference => $columns)
        {
            $preventivo = new Preventivo();
            $preventivo->setEnfermedad($columns['enfermedad']);
            $preventivo->setDescripcion($columns['descripcion']);
            $preventivo->setGrupoRiesgo($columns['grupo_riesgo']);
            $preventivo->setRecomendacion($columns['recomendacion']);
            foreach ($columns['servicios'] as $servicio) {
                $preventivo->addServicio($manager->merge($this->getReference('Servicio_' . $servicio)));
            }

            $manager->persist($preventivo);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('Preventivo_'. $reference, $preventivo);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'preventivos';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 7;
    }
}