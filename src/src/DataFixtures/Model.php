<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class Model extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $brand = $manager->getRepository(\App\Entity\Brand::class)->findOneBy(['id' => 1]);

        $model = new \App\Entity\Model();
        $model->setName('BMW 7 Long')
            ->setBrand($brand)
            ->setEngineCapacity(2.4)
            ->setEnginePower(157)
            ->setGearboxType('DSG');
        $manager->persist($model);
        $manager->flush();

        $model = new \App\Entity\Model();
        $model->setName('BMW 4 Gran Coupe')
            ->setBrand($brand)
            ->setEngineCapacity(1.8)
            ->setEnginePower(332)
            ->setGearboxType('Robot 3F');
        $manager->persist($model);
        $manager->flush();

        $model = new \App\Entity\Model();
        $model->setName('BMW Z4 Roadster')
            ->setBrand($brand)
            ->setEngineCapacity(3.5)
            ->setEnginePower(203)
            ->setGearboxType('Typetronic');
        $manager->persist($model);
        $manager->flush();

        $brand = $manager->getRepository(\App\Entity\Brand::class)->findOneBy(['id' => 2]);

        $model = new \App\Entity\Model();
        $model->setName('Airwave')
            ->setBrand($brand)
            ->setEngineCapacity(1.8)
            ->setEnginePower(125)
            ->setGearboxType('Variator H');
        $manager->persist($model);
        $manager->flush();

        $model = new \App\Entity\Model();
        $model->setName('Odyssey')
            ->setBrand($brand)
            ->setEngineCapacity(1.5)
            ->setEnginePower(98)
            ->setGearboxType('Hybrid');
        $manager->persist($model);
        $manager->flush();

        $model = new \App\Entity\Model();
        $model->setName('Legend')
            ->setBrand($brand)
            ->setEngineCapacity(2.2)
            ->setEnginePower(183)
            ->setGearboxType('Variator');
        $manager->persist($model);
        $manager->flush();

        $brand = $manager->getRepository(\App\Entity\Brand::class)->findOneBy(['id' => 3]);

        $model = new \App\Entity\Model();
        $model->setName('Q3')
            ->setBrand($brand)
            ->setEngineCapacity(2.4)
            ->setEnginePower(215)
            ->setGearboxType('DSG');
        $manager->persist($model);
        $manager->flush();

        $model = new \App\Entity\Model();
        $model->setName('SQ5')
            ->setBrand($brand)
            ->setEngineCapacity(2.5)
            ->setEnginePower(215)
            ->setGearboxType('TypeTronic');
        $manager->persist($model);
        $manager->flush();

        $model = new \App\Entity\Model();
        $model->setName('V8')
            ->setBrand($brand)
            ->setEngineCapacity(4.2)
            ->setEnginePower(280)
            ->setGearboxType('mechanical');
        $manager->persist($model);
        $manager->flush();

        $brand = $manager->getRepository(\App\Entity\Brand::class)->findOneBy(['id' => 4]);

        $model = new \App\Entity\Model();
        $model->setName('2101')
            ->setBrand($brand)
            ->setEngineCapacity(1.3)
            ->setEnginePower(64)
            ->setGearboxType('mechanical');
        $manager->persist($model);
        $manager->flush();

        $model->setName('21099')
            ->setBrand($brand)
            ->setEngineCapacity(1.5)
            ->setEnginePower(73)
            ->setGearboxType('mechanical');
        $manager->persist($model);
        $manager->flush();

        $model->setName('X-Ray')
            ->setBrand($brand)
            ->setEngineCapacity(1.8)
            ->setEnginePower(104)
            ->setGearboxType('Robotech');
        $manager->persist($model);
        $manager->flush();
    }
}
