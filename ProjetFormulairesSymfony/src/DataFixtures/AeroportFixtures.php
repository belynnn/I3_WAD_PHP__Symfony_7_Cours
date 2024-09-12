<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\Aeroport;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AeroportFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_BE");

        for($i = 0; $i < 100; $i++){
            $aeroport = new Aeroport(
                [
                    'nom' => $faker->city(),
                    'code' => $faker->countryISOAlpha3(),
                    'description' => $faker->text(),
                    'dateMiseEnService' => $faker->dateTime(),
                ]
            );

            $manager->persist($aeroport);
        }

        $manager->flush();
    }
}
