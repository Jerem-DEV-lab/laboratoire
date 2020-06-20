<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker/Faker;
class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        //Create 20 products Fixtures
        $faker = Faker\Factory::create();

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
