<?php

namespace App\DataFixtures;

use DateTime;
use Faker\Factory;
use App\Entity\Livre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class LivreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_BE");

        for($i = 0; $i < 100; $i++){
            $livre = new Livre(
                [
                    'titre' => $faker->streetName(),
                    'prix' => $faker->randomFloat(2),
                    'description' => $faker->paragraph(2, false),
                    'datePublication' => $faker->dateTime(),
                    'isbn' => $faker->isbn13(),
                ]
            );

            $manager->persist($livre);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
