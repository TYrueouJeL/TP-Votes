<?php

namespace App\DataFixtures;

use App\Entity\Law;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LawFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $law = new Law();
        $law->setTitle('Loi 1');
        $law->setContent('Plus de frites à la cantine.');
        $law->setPublishDate(new \DateTime('2022-12-20'));
        $manager->persist($law);

        $law = new Law();
        $law->setTitle('Loi 2');
        $law->setContent("Moins d'arbres en france.");
        $law->setPublishDate(new \DateTime('2024-07-11'));
        $manager->persist($law);

        $manager->flush();
    }
}
