<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\CategoryDelivery;
use App\Entity\Products;
use App\Entity\Delivery;
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

        for ($k = 0; $k < 10; $k++ )
        {
            $delivery = new Delivery();
            $delivery
                ->setCity($faker->city)
                ->setCheckinTime($faker->dateTime($max = 'now', $timezone = null))
                ->setMeeting($faker->city)
            ;
            $manager->persist($delivery);
        }

        for ($a = 0; $a < 1; $a++)
        {
            $categoryDelivery = new CategoryDelivery();
            $categoryDelivery
                ->setTitle('Livraison n° ' . $a )
            ;
            $manager->persist($categoryDelivery);
        }
        $manager->flush();
    }
    //TODO: FIXTURES DELIVERY DATA
}
