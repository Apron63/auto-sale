<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class XJournel extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $model = $manager->getRepository(\App\Entity\Model::class)->findOneBy(['id' => 1]);

        $journel = new \App\Entity\Journel();
        $journel->setDate(new \DateTime())
            ->setDealer('Auto Best')
            ->setModel($model)
            ->setReleased(2000)
            ->setVin('wewefergrwrtgrwtgwrtvr');
        $manager->persist($journel);
        $manager->flush();

        $model = $manager->getRepository(\App\Entity\Model::class)->findOneBy(['id' => 4]);

        $journel = new \App\Entity\Journel();
        $journel->setDate((new \DateTime())->modify('-10 Days'))
            ->setDealer('SuperPuper')
            ->setModel($model)
            ->setReleased(2010)
            ->setVin('rfrfrftt');
        $manager->persist($journel);
        $manager->flush();

        $model = $manager->getRepository(\App\Entity\Model::class)->findOneBy(['id' => 7]);

        $journel = new \App\Entity\Journel();
        $journel->setDate((new \DateTime())->modify('-5 Days'))
            ->setDealer('Friday Ride')
            ->setModel($model)
            ->setReleased(2020)
            ->setVin('12232343hfjgkhuhk');
        $manager->persist($journel);
        $manager->flush();
    }
}
