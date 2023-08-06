<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Product;
use App\Entity\Client;
use App\Repository\ClientRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use DateTimeImmutable;

class AppFixtures extends Fixture
{
    public function __construct(private ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function load(ObjectManager $manager): void
    {
        // products

        $productsDatas = array(
            [
                'name' => 'Nokia 3310',
                'description' => "Les points forts :
                    Capacité de la batterie : 900 mAh
                    Fonctions du téléphone : Compteur d'appels, téléconférence, numérotation vocale, vibreur",
                'price' => 59.99,
                'brand' => 'Nokia'
            ],
            [
                'name' => 'BLACKBERRY BOLD 9900 NOIR',
                'description' => "Les points forts : TFT transmissif Résolution du capteur : 5 mégapixels Capacité : 1230 mAh Capacité de la mémoire interne : 8 Go RAM : 768 Mo - SDRAM Génération à haut débit mobile : 3G Système d'exploitation : BlackBerry 7 OS",
                'price' => 159,
                'brand' => "BLACKBERRY"
            ],
            [
                'name' => 'Microsoft 650 Lumia 4G 16GB black dark silver EU',
                'description' => "Les points forts :
                    Taille de la diagonale : 5
                    Résolution du capteur : 8 mégapixels
                    Capacité de la batterie : 2000 mAh
                    Capacité de la mémoire interne : 16 Go
                    Quadruple coeur
                    RAM : 1 Go
                    Génération à haut débit mobile : 4G
                    Protection : Verre Corning Gorilla 3 (verre résistant aux rayures)",
                'price' => 110.24,
                'brand' =>"Microsoft"
            ],
            [
                'name' => 'APPLE iPhone 14 Pro 256GB Space Black',
                'description' => "Les points forts :
                    Taille de la diagonale : 6.1
                    Résolution du capteur : 48 mégapixels
                    Capacité de la mémoire interne : 256 GB
                    CPU 6 cœurs avec 2 cœurs de performance et 4 cœurs à haute efficacité énergétique. GPU 5 cœurs. Neural Engine 16 cœurs.
                    Génération à haut débit mobile : 5G
                    Système d'exploitation : iOS 16
                    Fonctions du téléphone : Contrôle vocal. VoiceOver. Zoom. Loupe. Prise en charge RTT et TTY. Siri et Dictée. Écrire à Siri. Contrôle de sélection. Sous‑titres codés. AssistiveTouch. Contenu énoncé. Toucher le dos de l’appareil.
                    Couleur du boitier : Noir sidéral",
                'price' => 1359,
                'brand' => "Apple"
            ],
            [
                'name' => 'Samsung Galaxy S23 Ultra',
                'description' =>"Les points forts :
                    Taille de la diagonale : 6.8
                    Résolution du capteur : 200 Mp
                    Capacité de la batterie : 5000 mAh
                    Capacité de la mémoire interne : 256Go
                    RAM : 8Go
                    Génération à haut débit mobile : 5G
                    Protection : Gorilla Glass Victus 2",
                'price' => 1199,
                'brand' => "Samsung"
            ],
            [
                'name' => "XIAOMI 12 256Go 5G Bleu",
                'description' => "Les points forts :
                    Taille de la diagonale : 6.28’’
                    Résolution du capteur : 8K et 4K HDR10+
                    Capacité de la batterie : 4500 mAh
                    Capacité de la mémoire interne : 256 Go
                    8 cœurs
                    Génération à haut débit mobile : 5G
                    Protection : Corning® Gorilla® Glass Victus®
                    Système d'exploitation : Android 12",
                'price' => 429,
                'brand' =>"XIAOMI"
            ],
            [
                'name' => 'Google Pixel 6 128 Go Noir',
                'description' => "Les points forts :
                    Taille de la diagonale : 6.4 
                    Capacité de la batterie : Li-Ion 4614 mAh
                    Capacité de la mémoire interne : 128 Go
                    Octa-core (2x2.80 GHz Cortex-X1 & 2x2.25 GHz Cortex-A76 & 4x1.80 GHz Cortex-A55) - 8 coeurs
                    RAM : LPDDR5 de 8 Go
                    Génération à haut débit mobile : 5G
                    Protection : Gorilla® Glass Victus™ de Corning®
                    Système d'exploitation : Android 12",
                'price' => 376,
                'brand' =>"Google"
            ],
            [
                'name' => "DOOGEE S99 Smartphone Robuste 8Go+ 128Go 6.3'' 108MP Caméra + 64MP Vision nocturne 6000mAh IP68 Téléphone NFC Double SIM GPS - or'",
                'description' =>"Les points forts :
                    Taille de la diagonale : 6.3
                    Résolution du capteur : 108 mégapixels
                    Capacité de la batterie : 6000mAh
                    Capacité de la mémoire interne : 128 Go
                    8 coeurs
                    RAM : 8 Go
                    Génération à haut débit mobile : 4G/3G/2G
                    Protection : IP68/IP69K/MIL-STD-810H",
                'price' => 209,
                'brand' => "Motorola"
            ],
            [
                'name' => 'HUAWEI P30 Lite 128 Go Blanc',
                'description' => "Les points forts :
                    Taille de la diagonale : 6.15
                    Résolution du capteur : 48 mégapixels
                    Capacité de la batterie : 3340 mAh
                    Capacité de la mémoire interne : 128 Go
                    2.2 GHz - 8 coeurs
                    RAM : 4 Go
                    Génération à haut débit mobile : 4G
                    Système d'exploitation : Android 9.0 Pie",
                'price' => 122,
                'brand' =>"HUAWEI"
            ],
            [
                'name' => 'VIVO Y72 5G 128Go Bleu',
                'description' => "Les points forts :
                    Taille de la diagonale : 6.58
                    Résolution du capteur : 64 mégapixels
                    Capacité de la batterie : 5000 mAh
                    Capacité de la mémoire interne : 128 Go
                    8 coeurs
                    RAM : 8 Go
                    Génération à haut débit mobile : 5G
                    Système d'exploitation : Funtouch OS 11.1 (based on Android 11)",
                'price' => 320,
                'brand' =>"VIVO"
            ]
        );

        foreach($productsDatas as $data)
        {
            $product = new Product();
            $product->setName($data['name'])
            ->setDescription($data['description'])
            ->setPrice($data['price'])
            ->setBrand($data['brand']);

            $manager->persist($product);
        }

        // clients

        $clients = array();

        $clientsDatas = array(
            [
                'companyName' => "Super Entreprise",
                'email' => "superentreprise@gmail.com",
                "login" => "superent",
                "password" => "test"
            ],
            [
                'companyName' => "Cool phone",
                'email' => "coolphone@free.fr",
                "login" => "coolphone",
                "password" => "test"
            ]
        );

        foreach($clientsDatas as $data)
        {
            $client = new Client();
            $client->setCreatedAt(new DateTimeImmutable())
            ->setCompanyName($data['companyName'])
            ->setEmail($data['email'])
            ->setLogin($data['login'])
            ->setPassword($data['password']);

            $manager->persist($client);
        }

        $manager->flush();
    }
}
