<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Brand extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $brand = new \App\Entity\Brand();
        $brand->setName('BMW');
        $manager->persist($brand);
        $manager->flush();

        $brand = new \App\Entity\Brand();
        $brand->setName('Honda');
        $manager->persist($brand);
        $manager->flush();

        $brand = new \App\Entity\Brand();
        $brand->setName('Audi');
        $manager->persist($brand);
        $manager->flush();

        $brand = new \App\Entity\Brand();
        $brand->setName('Lada');
        $manager->persist($brand);
        $manager->flush();
    }
}
