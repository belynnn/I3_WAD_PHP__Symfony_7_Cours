<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Livre;
use App\Entity\Exemplaire;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ExemplaireFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // obtenir tous les éléments de l'entité de côté 1 (livre)
        $rep = $manager->getRepository(Livre::class);
        $livres = $rep->findAll();

        $faker = Factory::create("fr_BE");

        for($i = 0; $i < 100; $i++){
            $exemplaire = new Exemplaire(
                [
                    'etat' => $faker->randomElement(['bon', 'perdu', 'mauvais']),
                ]
            );

            // fixer les éléments obligatoire du côté 1 (livre)
            $exemplaire->setLivre($livres[rand(0,count($livres)-1)]);

            $manager->persist($exemplaire);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }

    public function getDependencies()
    {
        return([LivreFixtures::class]);
    }
}
