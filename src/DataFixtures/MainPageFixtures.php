<?php

namespace App\DataFixtures;

use App\Entity\MainPage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MainPageFixtures extends Fixture
{
    static $counter = 1;

    static $navTitles = [
        "Cabins",
        "Lodges",
        "Loose Reins Country",
        "Out And About",
        "Pantry",
        "Loose Talk",
        "Reviews"
    ];

    static $navImages = [
        "images/main_page_images/cabins-banner.jpg",
        "images/main_page_images/lodges-banner.jpg",
        "images/main_page_images/loose-reins-country-banner.jpg",
        "images/main_page_images/out-and-about-banner.jpg",
        "images/main_page_images/pantry-banner.jpg",
        "images/main_page_images/loose-talk-banner.jpg",
        "images/main_page_images/review-banner.jpg"
    ];

    static $summaries = [
        [
            "content" => "<h2>Choose one of our cosy cabins – Ranchers, Trappers or Gold Panners. A taste of the pioneer life in modern luxury.</h2><p>Embrace that pioneer spirit. Watch the deer in the woods and the buzzards up high. Light the woodburner and curl up on the king-size bed, under the authentic American quilt. Explore the games cupboard, swap stories of the day’s riding. Watch the sunset with a cold beer out on the porch or round the firebowl.</p>",
            "image" => "images/main_page_images/cabins-summary.jpg"
        ],
        [
            "content" => "<h2>It might be canvas, but it’s a whole lot more than camping.</h2><p>Sip cocoa under a starlit sky, miles from the hustle and bustle. Toast marshmallows on the fire bowl, snug in a woollen blanket. Eat a home-cooked meal at the dining table, unwind on the sofa after your first Western riding lesson. Make secret plans in the play area, watch the sunset on the deck or play Snakes and Ladders by the woodburner. </p><p>We have three canvas Pioneer Lodges, each sleeping six people.</p>",
            "image" => "images/main_page_images/lodges-summary.jpg"
        ],
        [
            "content" => "",
            "image" => ""
        ],
        [
            "content" => "",
            "image" => ""
        ],
        [
            "content" => "<h2>What’s the pioneer trail life without good tucker? </h2><p>Eat well at Loose Reins. Grab some delicious ingredients from the shop at the Barn or one of our home made specialities, ready to warm up on the stove.</p><p>Dive into a breakfast or barbecue hamper for locally produced meat and our very own free range eggs. Pour a glass or two of wine from our cellar or sample the local brew.</p><p>Enjoy delicious local food. It all tastes that little bit better, whether you’re al fresco on the porch with a barbecue or snug inside with a warming winter stew.</p>",
            "image" => "images/main_page_images/pantry.jpg"
        ],
        [
            "content" => "",
            "image" => ""
        ],
        [
            "content" => "",
            "image" => ""
        ],
    ];

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < count(self::$navTitles); $i++){

            $navItem = new MainPage();
            $navItem->setTitle(self::$navTitles[$i]);
            $navItem->setImage(self::$navImages[$i]);
            $navItem->setSummary(self::$summaries[$i]);

            // Add a reference nav_item#COUNTER#
            $this->addReference(sprintf('%s_%d', 'nav_item', self::$counter), $navItem);
            self::$counter++;

            $manager->persist($navItem);
        }

        $manager->flush();
    }
}
