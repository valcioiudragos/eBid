<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private const USERS = [
        [
            'username' => 'john_doe',
            'email' => 'john_doe@doe.com',
            'password' => 'john123',
        ],
        [
            'username' => 'rob_smith',
            'email' => 'rob_smith@smith.com',
            'password' => 'rob12345',
        ],
        [
            'username' => 'marry_gold',
            'email' => 'marry_gold@gold.com',
            'password' => 'marry12345',
        ],
        [
            'username' => 'super_admin',
            'email' => 'super_admin@admin.com',
            'password' => 'admin12345',
        ],
    ];

    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);
        $this->loadProducts($manager);
    }

    private function loadUsers(ObjectManager $manager)
    {
        foreach (self::USERS as $userData) {
            $user = new User();
            $user->setUsername($userData['username']);
            $user->setEmail($userData['email']);
            $user->setPassword(
                $this->passwordEncoder->encodePassword(
                    $user,
                    $userData['password']
                )
            );
            $manager->persist($user);
        }

        $manager->flush();
    }

    private const PRODUCTS = [

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Prod1',
            'price' => '300',
            'description' => 'some1',
            'entry_date' => '2010-09-19',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Prod2',
            'price' => '140',
            'description' => 'some2',
            'entry_date' => '2005-03-23',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Prod3',
            'price' => '290',
            'description' => 'some3',
            'entry_date' => '2003-02-21',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Prod4',
            'price' => '20',
            'description' => 'some4',
            'entry_date' => '2004-01-22',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Prod5',
            'price' => '13',
            'description' => 'some5',
            'entry_date' => '2006-06-24',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Prod6',
            'price' => '90',
            'description' => 'some6',
            'entry_date' => '2007-07-24',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Prod7',
            'price' => '199',
            'description' => 'some7',
            'entry_date' => '2008-08-25',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Prod8',
            'price' => '233',
            'description' => 'some8',
            'entry_date' => '2015-09-12',
        ],
    ];

    private function loadProducts(ObjectManager $manager)
    {
        foreach (self::PRODUCTS as $productData) {
            $products = new Product();
            $products->setImg($productData["image"]);
            $products->setDescription($productData['description']);
            $products->setPrice($productData['price']);
            $products->setEntryDate(new \DateTime($productData['entry_date']));
            $products->setTitle($productData['title']);
            $manager->persist($products);
        }

        $manager->flush();
    }
}