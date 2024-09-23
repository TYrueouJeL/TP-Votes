<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setFirstName('Rémi');
        $user->setLastName('Guerin');
        $user->setBirthdate(new \DateTime('2005-12-21'));
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('Jhon');
        $user->setLastName('Doe');
        $user->setBirthdate(new \DateTime('2000-6-10'));
        $manager->persist($user);

        $user = new User();
        $user->setFirstName('Kevin');
        $user->setLastName('Martin');
        $user->setBirthdate(new \DateTime('2001-9-11'));
        $manager->persist($user);

        $manager->flush();
    }
}
