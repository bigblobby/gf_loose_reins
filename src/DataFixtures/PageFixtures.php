<?php

namespace App\DataFixtures;

use App\Entity\MainPage;
use App\Entity\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Faker\Provider\Image;

// TODO clean this page
class PageFixtures extends Fixture
{
    static $counter = 1;

    static $links = [
        [
            "Living",
            "Kitchen & Dining",
            "Bedrooms",
            "Bathroom",
            "Porch",
            "Children",
            "Dogs",
            "Games & WiFi"
        ],
        [
            "Living",
            "Kitchen & Dining",
            "Bedrooms",
            "Bathroom",
            "Deck",
            "Children",
            "Dogs",
            "Games & WiFi",
            "Special Offers"
        ],
        [
            "AONB",
            "Adventures",
            "Relax at Loose Reins"
        ],
        [
            "Blackmore Vale",
            "Jurassic Coast",
            "Visitor Attractions",
            "Food & Drink",
            "Pubs & Restaurants"
        ],
        [
            "Menu",
            "Shop",
            "Cellar",
            "Gifts & Merchandise"
        ],
        [
            ""
        ],
        [
            "Press Reviews",
            "Visitor Testimonials",
            "Award"
        ]
    ];

    /** @var Generator */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('en_GB');
    }

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < count(self::$links); $i++) {

            /** @var MainPage $mainPage */
            $mainPage = $this->getReference('main_page_' . $i);

            for($j = 0; $j < count(self::$links[$i]); $j++){
                $catImage = Image::imageUrl(1900, 1200, "cats");

                $panels = [
                    [
                        "content" => "<h1>Made Up</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, culpa earum ipsa laboriosam libero maiores modi nemo obcaecati odio possimus!</p><button>CLICK</button>",
                        "image" => "$catImage"
                    ]
                ];

                $page = new Page();
                $page->setTitle(self::$links[$i][$j]);
                $page->setPreview("<h2>Test " . self::$links[$i][$j]. "</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque distinctio necessitatibus numquam odit quidem, sequi? Consectetur deserunt eos ex facilis ipsa iure libero maiores, minima, molestias mollitia perspiciatis qui.</p>");
                $page->setPreviewImage($catImage);
                $page->setPanels(($panels));
                $page->setMainPage($mainPage);

                $this->addReference(sprintf('%s_%d', 'page', self::$counter), $page);
                self::$counter++;

                $manager->persist($page);
            }

        }

        $contactIntro = [
                "intro" => "We'd love to hear from you! Please get in touch if you'd like to visit or have any questions about Loose Reins.",
                "address" => "Ridgeway Farm,<br>Shillingstone,<br>Dorset,<br>DT11 0TF",
                "contactNumber" => "01258 863533",
                "findUs" => "How To Find Us",
                "directions" => "Download Directions"
        ];

        $contactPage = new Page();
        $contactPage->setTitle("Contact Us");
        $contactPage->setPreviewImage("images/contact_form/image-1.jpg");
        $contactPage->setPanels($contactIntro);
        $manager->persist($contactPage);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [MainPage::class];
    }
}
