<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Profil;
use App\Entity\AdminSystem;
use App\Entity\AdminAgence;
use App\Entity\Agent;
use App\Entity\Caissier;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /**
     * @var UserPasswordEncoderInterface
     * L'encodeur de mot de pass
     */

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('fr_FR');

        for($i=0; $i<3; $i++) {
            
            $profil = new Profil();

            $profil->setLibelle($faker->randomElement(['AdminSystem', 'AdminAgence', 'Agent', 'Caissier']));
            
            $manager->persist($profil);
            $entity = "App\\Entity\\".$profil->getLibelle();

            $user = new $entity();

            $hash = $this->encoder->encodePassword($user, "password");

            $user->setEmail($faker->email)
                 ->setPassword($hash)
                 ->setPrenom($faker->firstName)
                 ->setNom($faker->lastName)
                 ->setTelephone($faker->phoneNumber)
                 ->setStatut(1)
                 ->setProfil($profil);
                

                $manager->persist($user);
        }

        $manager->flush();
    }
}
