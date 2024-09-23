<?php

namespace App\DataFixtures;

use App\Entity\Domain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DomainFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $domain = new Domain();
        $domain->setTitle('Alimentation');
        $domain->setDescription("Lois relatives à l'alimentation");
        $manager->persist($domain);

        $domain = new Domain();
        $domain->setTitle('Écologie');
        $domain->setDescription("Lois relatives à lécologie");
        $manager->persist($domain);

        $manager->flush();
    }
}
