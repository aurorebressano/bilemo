<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\Client;
use App\DataFixtures\AppFixtures;
use App\Repository\ClientRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use DateTimeImmutable;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @return array<array-key, class-string<Fixture>>
     */
    public function getDependencies(): array
    {
        return [AppFixtures::class];
    }

    public function load(ObjectManager $manager): void
    {
        /** @var array<array-key, Client> $clients */
        $clients = $manager->getRepository(Client::class)->findAll();

        // users
        $usersDatas = array(
            ['email' => 'userone@user.fr', 
            'name' => 'UserOne', 
            'firstname' => 'Lambda'
            ],
            ['email' =>'usertwo@user.fr', 
            'name' =>'UserTwo', 
            'firstname' =>'Lambda'
            ],
            ['email' =>'userthree@user.fr', 
            'name' =>'UserThree', 
            'firstname' =>'Lambda'
            ]
        );

        foreach($usersDatas as $data)
        {
            $user = new User();
            $user->setEmail($data['email'])
            ->setName($data['name'])
            ->setFirstname($data['firstname'])
            ->setCreatedAt(new DateTimeImmutable());

            $user->setIsClientOf($clients[array_rand($clients)]);

            $manager->persist($user);
        }
    
        $manager->flush();
    }
}