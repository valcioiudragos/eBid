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
            'title' => 'Aparat foto DSLR Canon EOS 80D, 24.2 MP, WiFi, Negru + Obiectiv EF-S 18-135mm IS',
            'price' => '6499',
            'description' => 'Un aparat de fotografiat puternic si versatil, EOS 80D exceleaza la fotografii in miscare, portrete, peisaje, realizate in calatorii sau fotografii realizate la lumina scazuta dar si filmari, datorita unei tehnologii inovatoare.',
            'entry_date' => '2010-09-19',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Aparat foto digital Sony Cyber-Shot DSC-H300, 20.1MP, Black',
            'price' => '1117',
            'description' => 'Lasati zoomul puternic sa va aduca mai aproape de detalii Cyber-shot™ H300 cu zoom optic puternic 35x apropie subiectul. Cu senzorul de 20,1 MP, imaginea HD si functiile creative surprindeti imagini si clipuri video detaliate.',
            'entry_date' => '2005-03-23',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Laptop ultraportabil ASUS ZenBook UX461UA-E1012T cu procesor Intel® Core™ i5-8250U pana la 3.60 GHz, Kaby Lake R, 14", Full HD, 8GB, 256GB M.2 SSD, Intel® UHD Graphics 620, Microsoft Windows 10, Grey',
            'price' => '3999',
            'description' => 'Nu este nimic obisnuit cu privire la superbul ZenBook Flip 14, dar exista o multime de lucruri extraordinare.',
            'entry_date' => '2003-02-21',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Laptop Gaming MSI GT75 Titan 8RF-075RO cu procesor Intel® Core™ i9-8950HK pana la 4.80 GHz, Coffee Lake, 17.3", Full HD 120Hz 3ms, 32GB, 1TB + 2 x 256GB SSD, NVIDIA GeForce GTX 1070 8GB SLI, Microsoft Windows 10, Black, RGB Backlit Mechanical',
            'price' => '22699',
            'description' => 'Laptop Gaming MSI GT75 Titan 8RF-075RO Pregatiti-va sa domnati campul cu un avantaj nedrept. E ca si cum ai aduce bazooka la luptele cu cutitele. Procesor i9 de generatie a 8-a NVIDIA GEFORCE GTX SERIA 10.',
            'entry_date' => '2006-06-24',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Bicicleta BMX 20" VELORS V2016C, cadru otel, culoare negru / alb',
            'price' => '549',
            'description' => 'Concepute pentru initierea in Freestyle ( nivel ocazional ). Bicicletele BMX sunt preferate in special de tineri, dornici de acrobatii si sarituri cu bicicleta. Pasionatii de sarituri si trick-uri pe doua roti iubesc bicicletele BMX pentru mobilitatea, fl',
            'entry_date' => '2007-07-24',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Bicicleta Fat Bike VELORS, V2619B, cadru otel, culoare negru / albastru',
            'price' => '1249',
            'description' => 'VELORS otel suspensie pe arc, cursa 100 mm,	negru / albastru, otel 28,6*1.4*250L ',
            'entry_date' => '2008-08-25',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Joc societate Twister',
            'price' => '43',
            'description' => 'Rasuceste-te si incurca-te, acum cu 2 miscari suplimentare. Nu atinge covorasul cu nimic altceva decat cu mana sau piciorul.',
            'entry_date' => '2015-09-12',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'Joc de societate Alias, Women vs. Men',
            'price' => '82',
            'description' => 'Inca de la inceput se delimiteaza taberele: grupul eternului feminin cochet si gasca barbatilor mereu pusi pe sotii. De acum inainte competitia poate incepe!
Obiectivul? Sa castige cea mai buna echipa!',
            'entry_date' => '2015-09-12',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'LEGO® Star Wars™ Star Destroyer™ al Ordinului Intai 75190',
            'price' => '779',
            'description' => 'Comanda flota cu teribilul Star Destroyer™ al Ordinului Intai!
Alatura-te liderului suprem Snoke pentru a guverna galaxia la bordul puternicului Distrugator stelar al Ordinului intai! Actioneaza lansatoarele de piroane pentru a invinge navele inamice.',
            'entry_date' => '2015-09-12',
        ],

        [
            'image' => 'https://edition.cnn.com/travel/article/iconic-mountains-world/index.html',
            'title' => 'LEGO® Star Wars™ BB-8™ 75187',
            'price' => '449',
            'description' => 'Dobandeste propriul tau LEGO® BB-8! invarte roata pentru a rasuci capul si mai roteste o data pentru a deschide trapa si a vedea cum apare arzatorul de sudare, exact ca in film! il poti aseza de asemenea pe BB-8 pe stativ pentru a-l arata pe droidul tau.',
            'entry_date' => '2015-09-12',
        ]
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