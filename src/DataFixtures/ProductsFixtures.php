<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker\Factory;
class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Create 20 products Fixtures
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 10; $i++)
        {
            $product = new Products();
            $product
                ->setName($faker->words(3, true))
                ->setDescription($faker->sentences(3, true))
                ->setPrice($faker->numberBetween(10, 50))
           ;
            $manager->persist($product);
        }
        $manager->flush();
    }
}
