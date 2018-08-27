<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use AppBundle\Entity\Process;

class LoadProcessData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * Devuelve un proceso falso.
     *
     * @param ObjectManager $em
     * @return Process
     */
    protected function fakeProcess(ObjectManager $em)
    {
        $cities = [
            'Bogotá',
            'México',
            'Peru',
        ];

        $faker = \Faker\Factory::create();

        $process = new Process();

        $process->setNumber(str_pad(mt_rand(1, 100000), 8, "0", STR_PAD_LEFT));
        $process->setDescription($faker->sentence(10, true));
        $process->setDate(
            new \DateTime(
                $faker->date('Y-m-d', '2018-07-1')
                )
            );

        $process->setCity($em->merge(
            $this->getReference($cities[array_rand($cities)])
            )
        );
        $process->setQuotation($faker->randomFloat(
            2,
            1000000,
            10000000
            )
        );

        return $process;
    }

    public function load(ObjectManager $em)
    {
        for ($i=0; $i < 8; $i++) {
            // code...
            $process = $this->fakeProcess($em);
            $em->persist($process);
            $em->flush();
        }
    }

    public function getOrder()
    {
        return 2;
    }
}
