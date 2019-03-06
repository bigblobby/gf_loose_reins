<?php

namespace App\DataFixtures;

use App\Entity\Navigation;
use App\Entity\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Faker\Provider\Image;

class PageFixtures extends Fixture
{
    static $counter = 1;

    static $links = [
        1 => [
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
        for($i = 1; $i <= count(self::$links); $i++) {

            /** @var Navigation $navItem */
            $navItem = $this->getReference('nav_item_' . $i);

            foreach (self::$links[$i] as $link) {
                $panels = [
                    "panel-1" => "<h1>Made Up</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, culpa earum ipsa laboriosam libero maiores modi nemo obcaecati odio possimus!</p><button>CLICK</button>"
                ];

                $page = new Page();
                $page->setTitle($link);
                $page->setPreview("<h2>Test $link</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam atque distinctio necessitatibus numquam odit quidem, sequi? Consectetur deserunt eos ex facilis ipsa iure libero maiores, minima, molestias mollitia perspiciatis qui.</p>");
                $page->setPreviewImage(Image::imageUrl(1900, 1200, "cats"));
                $page->setPanels(json_encode($panels));
                $page->setNavigation($navItem);

                $this->addReference(sprintf('%s_%d', 'page', self::$counter), $page);
                self::$counter++;

                $manager->persist($page);
            }
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [Navigation::class];
    }
}
