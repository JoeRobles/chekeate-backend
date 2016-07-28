<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\DataFixtures\ORM\LoadAppData;
use AppBundle\Entity\UserLocation as UserLocation;

class LoadUserLocationData extends LoadAppData implements OrderedFixtureInterface
{
    /**
     * Main load function.
     *
     * @param Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $userLocations = $this->getModelFixtures();

        // Now iterate thought all fixtures
        foreach ($userLocations['UserLocation'] as $reference => $columns)
        {
            $userLocation = new UserLocation();
            $userLocation->setLongitude($columns['longitude']);
            $userLocation->setLatitude($columns['latitude']);
            $userLocation->setServicio($manager->merge($this->getReference('Servicio_' . $columns['servicio'])));

            $manager->persist($userLocation);

            // Add a reference to be able to use this object in others entities loaders
            $this->addReference('UserLocation_'. $reference, $userLocation);
        }
        $manager->flush();
    }

    /**
     * The main fixtures file for this loader.
     */
    public function getModelFile()
    {
        return 'user_locations';
    }

    /**
     * The order in which these fixtures will be loaded.
     */
    public function getOrder()
    {
        return 9;
    }
}