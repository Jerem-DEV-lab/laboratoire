<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker\Factory;
class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        //Create 20 products Fixtures
         for ($i = 0; $i < 3; $i++)
         {
             $categories = new Categorie();
             $categories->setName($faker->sentences(1, true))
             ;
             $manager->persist($categories);
         }

        for ($j = 0; $j < 10; $j++)
        {
            $product = new Products();
            $product
                ->setName($faker->words(3, true))
                ->setDescription($faker->sentences(3, true))
                ->setPrice($faker->numberBetween(10, 50))
                ->setCategorie($categories)
            ;
            $manager->persist($product);
        }

        $manager->flush();
    }
    //TODO: FIXTURES DELIVERY DATA
}
