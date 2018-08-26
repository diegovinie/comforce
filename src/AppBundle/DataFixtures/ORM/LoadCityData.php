<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\City;

class LoadCityData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $cities = [
            'Bogotá',
            'México',
            'Peru',
        ];

        foreach ($cities as $name) {
            // code...
            $city = new City();
            $city->setName($name);
            $em->persist($city);
        }

        $em->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
