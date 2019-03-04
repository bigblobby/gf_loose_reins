<?php

namespace App\DataFixtures;

use App\Entity\Page;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Faker\Provider\Image;

class PageFixtures extends Fixture
{

    static $links = [
        "Living",
        "Kitchen & Dining",
        "Bedrooms",
        "Bathroom",
        "Porch",
        "Children",
        "Dogs",
        "Games & WiFi"
    ];

    /** @var Generator */
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('en_GB');
    }

    public function load(ObjectManager $manager)
    {
        foreach (self::$links as $link){
            $panels = [
                "panel-1" => "<h1>Made Up</h1><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias, culpa earum ipsa laboriosam libero maiores modi nemo obcaecati odio possimus!</p><button>CLICK</button>"
            ];

            $page = new Page();
            $page->setTitle($link);
            $page->setPreview("<h1>Test $link</h1>");
            $page->setPreviewImage(Image::imageUrl(640, 480, "cats"));
            $page->setPanels(json_encode($panels));

            $manager->persist($page);
        }
        $manager->flush();
    }
}
