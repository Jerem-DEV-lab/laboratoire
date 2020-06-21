<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker\Factory;
class CategoriesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Create 20 products Fixtures
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++)
        {
            $categories = new Categorie();
            $categories
                ->setName($faker->words(3, true))
            ;
            $manager->persist($categories);
        }
        $manager->flush();
    }
}
