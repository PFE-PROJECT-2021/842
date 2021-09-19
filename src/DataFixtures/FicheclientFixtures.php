<?php

namespace App\DataFixtures;

use Faker;
use Faker\Factory;
use App\Entity\Ficheclient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FicheclientFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++) {

            $ficheclient = new Ficheclient();
            $ficheclient->setNomclient($faker->name);
            $ficheclient->setTelclient($faker->e164PhoneNumber);
            $ficheclient->setEmailcli($faker->email);
            $ficheclient->setActivite($faker->jobTitle);
            $ficheclient->setSiteexistant($faker->boolean($chanceOfGettingTrue = 50));
            $ficheclient->setReferencement($faker->boolean);
            $ficheclient->setRaisonsociale($faker->company);

            $manager->persist($ficheclient );
        }


        $manager->flush();
    }
}
