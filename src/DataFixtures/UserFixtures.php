<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setPassword($this->encoder->encodePassword($user, 'password'));
        $user->setNom('Admin');
        $user->setPrenom('-');
        $user->setRoles(['ROLE_ADMIN', 'ROLE_USER', 'ROLE_MANAGER']);
        $user->setIsVerified(1);

        $manager->persist($user);


        $user = new User();
        $user->setEmail('lovasaussard@gmail.com');
        $user->setPassword($this->encoder->encodePassword($user, 'password'));
        $user->setNom('Lova');
        $user->setPrenom('Saussard');
        $user->setRoles(['ROLE_MANAGER']);
        $user->setIsVerified(1);

        $manager->persist($user);


        $user = new User();
        $user->setEmail('yoskar.842@gmail.com');
        $user->setPassword($this->encoder->encodePassword($user, 'password'));
        $user->setNom('Yoskar');
        $user->setPrenom('Badroudine');
        $user->setRoles(['ROLE_WEBMASTER']);
        $user->setIsVerified(1);

        $manager->persist($user);

        $manager->flush();
    }
}
